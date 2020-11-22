// Dropdown Menu

//One table
var dropdown = document.querySelectorAll('.dropdown');
var dropdownArray = Array.prototype.slice.call(dropdown,0);

dropdownArray.forEach(function(el){
    //row => date
    var button = el.querySelector('thead[data-toggle="dropdown"]'),
            //dropdown menu
            menu = el.querySelector('.dropdown-menu'),
            //button
			arrow = button.querySelector('.icon');

    arrow.onclick = function(event) {
		if (menu.hasClass('show')) {
			menu.classList.add('hide');
			menu.classList.remove('show');
			arrow.classList.add('close');
			arrow.classList.remove('open');
			event.preventDefault();
        }
        else if (menu.hasClass('hide')) {
			menu.classList.add('show');
			menu.classList.remove('hide');
			arrow.classList.add('open');
			arrow.classList.remove('close');
			event.preventDefault();
		}
		else {
			menu.classList.add('hide');
			menu.classList.remove('show');
			arrow.classList.add('close');
			arrow.classList.remove('open');
			event.preventDefault();
		}
	};
})

Element.prototype.hasClass = function(className) {
    return this.className && new RegExp("(^|\\s)" + className + "(\\s|$)").test(this.className);
};