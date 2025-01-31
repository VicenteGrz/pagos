//crea elemento
const video = document.createElement("video");

//nuestro camvas
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");

//div donde llegara nuestro canvas
const btnScanQR = document.getElementById("btn-scan-qr");

//lectura desactivada
let scanning = false;

//funcion para encender la camara
const encenderCamara = () => {
  navigator.mediaDevices
    .getUserMedia({ video: { facingMode: "environment" } })
    .then(function (stream) {
      scanning = true;
      btnScanQR.hidden = true;
      canvasElement.hidden = false;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.srcObject = stream;
      video.play();
      tick();
      scan();
    });
};

//funciones para levantar las funiones de encendido de la camara
function tick() {
  canvasElement.height = video.videoHeight;
  canvasElement.width = video.videoWidth;
  canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

  scanning && requestAnimationFrame(tick);
}

function scan() {
  try {
    qrcode.decode();
  } catch (e) {
    setTimeout(scan, 300);
  }
}

//apagara la camara
const cerrarCamara = () => {
  video.srcObject.getTracks().forEach((track) => {
    track.stop();
  });
  canvasElement.hidden = true;
  btnScanQR.hidden = false;
};


qrcode.callback = (respuesta) => {
  if (respuesta) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "busqueda.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const resultado = xhr.responseText;
        const resultadoContainer = document.getElementById("resultado-container");

        if (resultado) {
          const datos = JSON.parse(resultado);

          // Crear una tabla HTML
          const tabla = document.createElement("table");
          tabla.classList.add("table", "table-responsive"); // Agregar clases de Bootstrap para estilos

          // Crear la cabecera de la tabla
          const cabecera = tabla.createTHead();
          const filaCabecera = cabecera.insertRow();
          const camposMostrar = ['id', 'nombre', 'telefono', 'correo', 'plantel']; // Campos a mostrar
          camposMostrar.forEach((campo) => {
            const th = document.createElement("th");
            th.textContent = campo;
            filaCabecera.appendChild(th);
          });

          // Crear una fila para los datos
          const filaDatos = tabla.insertRow();
          camposMostrar.forEach((campo) => {
            const celda = filaDatos.insertCell();
            celda.innerHTML = `<strong>${campo}:</strong> ${datos[campo]}`;
          });

          // Limpiar el contenedor y agregar la tabla
          resultadoContainer.innerHTML = "";
          resultadoContainer.appendChild(tabla);
        } else {
          resultadoContainer.innerHTML = "No se encontraron resultados.";
        }
        cerrarCamara();
      }
    };

    // Enviar el valor del código QR al servidor
    xhr.send("codigo_qr=" + encodeURIComponent(respuesta));
  }
};
