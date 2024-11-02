<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // User-specific methods
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where('is_global', true)
            ->orWhereHas('userNotifications', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with([
                'userNotifications' => function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                }
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if (request()->ajax()) {
            return response()->json([
                'notifications' => $notifications,
                'unread_count' => $this->getUnreadCount()
            ]);
        }

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $user = Auth::user();
        $notification = Notification::findOrFail($id);

        $userNotification = $user->userNotifications()
            ->where('notification_id', $notification->id)
            ->firstOrCreate([
                'notification_id' => $notification->id
            ]);

        $userNotification->update(['read_at' => now()]);

        return redirect()->route('notifications.index')
            ->with('success', 'Notification marked as read');
    }

    public function markAllAsRead()
    {
        $user = Auth::user();
        $user->userNotifications()
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return redirect()->route('notifications.index')
            ->with('success', 'All notifications marked as read');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $user->userNotifications()
            ->where('notification_id', $id)
            ->delete();

        return redirect()->back()->with('success', 'Notification deleted successfully');
    }

    public function getUnreadCount()
    {
        return Auth::user()
            ->userNotifications()
            ->whereNull('read_at')
            ->count();
    }

    // Admin-specific methods
    public function adminIndex()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.layout.notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('admin.layout.notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:info,warning,success,error',
            'target_user' => 'required|in:all,specific',
            'user_id' => 'required_if:target_user,specific|nullable|exists:users,id'
        ]);

        $notification = Notification::create([
            'title' => $request->title,
            'message' => $request->message,
            'type' => $request->type,
            'is_global' => $request->target_user === 'all'
        ]);

        if ($request->target_user === 'specific' && $request->user_id) {
            $user = User::find($request->user_id);
            $notification->users()->attach($user->id);
        }

        return redirect()->route('admin.notifications')
            ->with('success', 'Notification created successfully');
    }

    public function adminDestroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('admin.notifications')
            ->with('success', 'Notification deleted successfully');
    }

    public function adminShow($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admin.layout.notifications.show', compact('notification'));
    }

    public function adminEdit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admin.layout.notifications.edit', compact('notification'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:info,warning,success,error',
            'target_user' => 'required|in:all,specific',
            'user_id' => 'required_if:target_user,specific|nullable|exists:users,id'
        ]);

        $notification->update([
            'title' => $request->title,
            'message' => $request->message,
            'type' => $request->type,
            'is_global' => $request->target_user === 'all'
        ]);

        return redirect()->route('admin.notifications')
            ->with('success', 'Notification updated successfully');
    }

    public function adminBulkDelete(Request $request)
    {
        $request->validate([
            'notification_ids' => 'required|array',
            'notification_ids.*' => 'exists:notifications,id'
        ]);

        Notification::whereIn('id', $request->notification_ids)->delete();

        return redirect()->route('admin.notifications')
            ->with('success', 'Selected notifications deleted successfully');
    }

    public function adminSearch(Request $request)
    {
        $search = $request->get('search');

        $notifications = Notification::where('title', 'like', "%{$search}%")
            ->orWhere('message', 'like', "%{$search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.layout.notifications.index', compact('notifications', 'search'));
    }
}