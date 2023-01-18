/* --------------------------------------------------*/
/* toggle sidebar */
function toogleSidebar(){
  var sidebar = document.querySelector('#wrapper');
  if (sidebar.classList.contains('togle')){
    sidebar.classList.remove('togle');
  }else{
    sidebar.classList.add('togle');
  }
}

/* --------------------------------------------------*/
/* dropdown menu sidebar */
document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar-menu .sidebar-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // temukan submenu lain dengan class=show
                var opened_submenu = parentEl.parentElement.querySelector('.sidebar-submenu.show');
                // jika ada, maka tutup semuanya
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
// DOMContentLoaded  end
