let bea_contents = [
    {
        tanggal: "10",
        bulan_tahun: "oct 2023",
        bea_name: "Beasiswa S1 di Qatar University, Qatar",
        bea_tags:
            "Beasiswa Luar Negeri, Beasiswa S1, Info Beasiswa, Perguruan Tinggi",
        bea_desc:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit tincidunt dictum. Donec in lectus porttitor, venenatis dolor eget, dictum augue. Pellentesque magna massa, consequat sit amet varius id, aliquet vel orci.\nVestibulum fermentum, leo vel finibus euismod, sem ligula ornare justo, at imperdiet magna justo nec orci. Duis ultricies augue leo, at tempor velit mollis at. Duis et sapien tempus, tristique sapien ut, ornare tortor.",
        img_source:
            "https://seeklogo.com/images/Q/qatar-university-logo-706685DBD5-seeklogo.com.png",
    },
    {
        tanggal: "11",
        bulan_tahun: "oct 2023",
        bea_name: "Beasiswa S1 di Qatar University, Qatar",
        bea_tags:
            "Beasiswa Luar Negeri, Beasiswa S1, Info Beasiswa, Perguruan Tinggi",
        bea_desc:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit tincidunt dictum. Donec in lectus porttitor, venenatis dolor eget, dictum augue. Pellentesque magna massa, consequat sit amet varius id, aliquet vel orci.\nVestibulum fermentum, leo vel finibus euismod, sem ligula ornare justo, at imperdiet magna justo nec orci. Duis ultricies augue leo, at tempor velit mollis at. Duis et sapien tempus, tristique sapien ut, ornare tortor.",
        img_source:
            "https://seeklogo.com/images/Q/qatar-university-logo-706685DBD5-seeklogo.com.png",
    },
    {
        tanggal: "12",
        bulan_tahun: "oct 2023",
        bea_name: "Beasiswa S1 di Qatar University, Qatar",
        bea_tags:
            "Beasiswa Luar Negeri, Beasiswa S1, Info Beasiswa, Perguruan Tinggi",
        bea_desc:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras suscipit tincidunt dictum. Donec in lectus porttitor, venenatis dolor eget, dictum augue. Pellentesque magna massa, consequat sit amet varius id, aliquet vel orci.\nVestibulum fermentum, leo vel finibus euismod, sem ligula ornare justo, at imperdiet magna justo nec orci. Duis ultricies augue leo, at tempor velit mollis at. Duis et sapien tempus, tristique sapien ut, ornare tortor.",
        img_source:
            "https://seeklogo.com/images/Q/qatar-university-logo-706685DBD5-seeklogo.com.png",
    },
];

// "use strict";
// import bea_contents from 'bea_contents.JSON' assert {type: 'json'};

let placeholder = document.querySelector("#data-output");
let out = "";
for (let content of bea_contents) {
    out += `
        <div class="row" style="padding-top: 70px">
        <div class="col-2" style="text-align: right">
          <h1 style="font-size: 70px; margin-bottom: -10px; margin-top: -10px">${content.tanggal}</h1>
          <h5 style="font-size: 17px">${content.bulan_tahun}</h5>
        </div>
        <div class="col-7">
          <h2>${content.bea_name}</h2>
          <div class="mb-2">
            <img src="assets/img/pembatas.png" class="mb-1" />
            <span style="font-style: italic; font-size: 19px; margin-left: 3px">${content.bea_tags}</span>
          </div>
          <h6>
          ${content.bea_desc}
          </h6>
          <button class="btn btn-dark" style="border-radius: 3px">Info Selengkapnya</button>
        </div>
        <div class="col-3">
          <img src="${content.img_source}" style="height: 200px" />
        </div>
      </div>
        `;
}

placeholder.innerHTML = out;
