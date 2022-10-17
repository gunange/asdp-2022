function setForm() {
    let eFrom = document.querySelectorAll('.data-form');
    eFrom.forEach((e) => {
        e.addEventListener('submit', (event) => {
            event.preventDefault();
            let thisForm = e;
            let action = thisForm.getAttribute('action');

            if (!action) {
                console.log("Atribut action tidak diset");
                return;
            }

            const formData = new FormData(thisForm);
            fetch(action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            }).then((response) => {

                return response.text();
            }).then((text) => {
                try {
                    const obj = JSON.parse(text);
                    if (obj.response == 'OK') {

                        if (obj.href){
                            swal("Good job!", obj.msg, "success", {
                                buttons: 'OK',
                            }).then((isTrue) => {
                                if (isTrue) {
                                    window.location.href = obj.href;
                                }
                            });

                        } else if (obj.modal){


                           swal("Good job!", obj.msg, "success", {
                                buttons: 'OK',
                            }).then((isTrue) => {
                                if (isTrue) {
                                    openModalShow(`${obj.modal[0]}`, `${obj.modal[1]}`, ()=>{injectJsDashboardPrimary();} )
                                }
                            });

                        }
                         else{
                            swal("Good job!", obj.msg, "success", {
                                buttons: false,
                            });
                        }

                        if (obj.function){
                            obj.function.forEach((fun)=>{
                                eval(fun)
                            });
                        }

                    } else {
                        swal(
                            "Oppps!",
                            obj.msg,
                            "error", {
                            buttons: 'OK, Saya mengerti',
                            dangerMode: true,
                        });
                    }
                    if (obj.debug) {
                        console.log(JSON.stringify(obj.debug));
                    }

                } catch (e) {
                    console.log(text);
                }

            }).catch((err) => {
                console.log(err);
            })
        });
    });

}


function openModalShow(target = "#modal-center-lg", model, components = () => { }) {
    modal = new bootstrap.Modal(document.querySelector(target), {
        keyboard: false
    });

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(target + " #modal-target-output").innerHTML = this.responseText;
            modal.show();
            setForm();
            components();
        }
    };

    xhttp.open("GET", model, true);
    xhttp.send();
}

function replaceModalShow(target = "#modal-center-lg", model, components = () => { }) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(target + " #modal-target-output").innerHTML = this.responseText;
            setForm();
            components();
        }
    };

    xhttp.open("GET", model, true);
    xhttp.send();
}

function replaceHtml(target = "", model, components = () => { }) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(target).innerHTML = this.responseText;
            components();
        }
    };

    xhttp.open("GET", model, true);
    xhttp.send();
}

function ImgPreview(event, id) {
    this.event = event;
    this.id = id;
    if (this.event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById(this.id);

        preview.src = src;
    }
}

function setFile(e, id, data = '<i class="bi bi-file-earmark-text-fill text-green"></i><p class="fs-5 text-center text-green">Upload file</p>') {
    dataFile = e.target.files;
    if (dataFile.length > 0) {

        document.querySelector('#' + id).innerHTML = data;
    }
}

function enablePassword(e, id) {
    pswd = document.getElementById(id);
    if (e.checked == true) {
        pswd.disabled = false
    } else {
        pswd.disabled = true
    }
}


function exportCsv(target, fileName = "sample") {
    $(target).tableHTMLExport({
        type: 'csv',
        filename: fileName + '.csv',
        separator: ',',
        newline: '\r\n',
        trimContent: true,
        quoteFields: true,
        ignoreColumns: '',
        ignoreRows: '',
        htmlContent: false,
        consoleLog: false,
    });
}

function exportExcel(target = "#example", fileName = "sample", exclude = ".noExl") {
    $(target).table2excel({
        exclude: exclude,
        name: "Data",
        filename: fileName + ".xls",
        fileext: ".xls",
        preserveColors: true
    });
}

function exportPdf(target = "#example", fileName = "sample") {
    html2canvas($(target)[0], {
        onrendered: function (canvas) {
            var data = canvas.toDataURL();
            var docDefinition = {
                content: [{
                    image: data,
                    width: 500
                }]
            };
            pdfMake.createPdf(docDefinition).download(fileName + ".pdf");
        }
    });
}

class App {

    bulan({count = 12} = {}){
      var  bulan = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];

        return bulan.slice(0, count);
    }
    
}