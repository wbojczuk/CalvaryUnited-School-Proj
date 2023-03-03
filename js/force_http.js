if(/https/gi.test(window.location.href)){
    window.location.href = (window.location.href).replace("https", "http");
}