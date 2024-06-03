function compile() {
  var html = document.getElementById("html");
  var css = document.getElementById("css");
  var js = document.getElementById("js");
  var code = document.getElementById("code").contentWindow.document;

  document.getElementById("btn_run").onclick= function() {
    code.open();
    code.writeln(
      html.value +
        "<style>" +
        css.value +
        "</style>" +
        "<script>" +
        js.value +
        "</script>"
    );
    code.close();
  };
}
 

let btn_run = document.getElementById("btn_run");
btn_run.addEventListener("mousemove", () => {
    compile();
});

let e = 1;



let btn_html = document.getElementById("btn_html");
let btn_css = document.getElementById("btn_css");
let btn_js = document.getElementById("btn_js");

let cmp_html = document.getElementById("compiler_html");
let cmp_css = document.getElementById("compiler_css");
let cmp_js = document.getElementById("compiler_js");

btn_html.addEventListener('click', () => {
  cmp_html.style.display = 'block';
  cmp_css.style.display = 'none';
  cmp_js.style.display = 'none';
  
  e = 1;
});

btn_css.addEventListener('click', () => {
    cmp_css.style.display = 'block';
    cmp_html.style.display = 'none';
  cmp_js.style.display = 'none';
  e = 2;
});

btn_js.addEventListener('click', () => {
    cmp_js.style.display = 'block';
    cmp_css.style.display = 'none';
  cmp_html.style.display = 'none';
  e = 3;
});


let btn_copy = document.getElementById('btn_copy');
btn_copy.addEventListener("click", () => {
  var copyText = document.getElementById("html");

  if (e == 1) {
    copyText = document.getElementById("html");
  }
  else if (e == 2) {
    copyText = document.getElementById("css");
  }
  else if (e == 3) {
    copyText = document.getElementById("js");
  }
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
});





