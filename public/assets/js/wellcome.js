window.onscroll = () => {
  if (document.documentElement.scrollTop > 90) {
    document.querySelector("#navbar").classList.add('navbar-scroll');
  } else {
    if (document.querySelector("#navbar").classList.contains('navbar-scroll')){
      document.querySelector("#navbar").classList.remove('navbar-scroll');
    }
  }
}


AOS.init({
  delay: 30, // values from 0 to 3000, with step 50ms
  duration: 700, // values from 0 to 3000, with step 50ms
  mirror: false
});

$(function(){
  $.scrollIt({
    scrollTime: 300,  
  });
});
