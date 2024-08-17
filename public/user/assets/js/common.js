window.onscroll = function() {myFunction()};
var navbar_sticky = document.getElementById("navbar_sticky");
var sticky = navbar_sticky.offsetTop;
var navbar_height = document.querySelector('.navbar').offsetHeight;
function myFunction() {
  if (window.pageYOffset >= sticky + navbar_height) {
    navbar_sticky.classList.add("sticky")
	document.body.style.paddingTop = navbar_height + 'px';
  } else {
    navbar_sticky.classList.remove("sticky");
	document.body.style.paddingTop = '0'
  }
}


$(document).ready(function () { 
            $('.dropdown').hover(function () { 
                $(this).addClass('show'); 
                $(this).find('.dropdown-menu').addClass('show'); 
            }, function () { 
                $(this).removeClass('show'); 
                $(this).find('.dropdown-menu').removeClass('show'); 
            }); 
        }); 
        
function togglePackageSection() {
    var button = document.getElementById('viewPack');
    var section = document.getElementById('allPackage');
        if (section.classList.contains('d-none')) {
            section.classList.remove('d-none');
            section.classList.add('d-block');
            button.textContent = 'Show Less';
        } else {
            section.classList.remove('d-block');
            section.classList.add('d-none');
            button.textContent = 'View All Packages';
        }
    }