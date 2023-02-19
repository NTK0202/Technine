// Init
createMenuControl();

// Đóng mở menu trên giao diện mobile
function createMenuControl () {
    let btn = document.getElementById('menu-btn-open-menu');
    let menu = document.getElementById('menu-sidebar');
    let bg = document.getElementById('menu-bg');

    let isOpen = false;

    // Open
    btn.onclick = () => {
        isOpen = true;

        menu.classList.add('open');
        bg.classList.add('open');

        menu.classList.add('animated', 'fadeInLeft');
        bg.classList.add('animated', 'fadeIn');

        menu.onanimationend = () => {
            if (isOpen) {
                menu.classList.remove('animated', 'fadeInLeft');
                bg.classList.remove('animated', 'fadeIn');                
            }
        }
    }

    // Close
    bg.onclick = () => {
        isOpen = false;

        menu.classList.add('animated', 'fadeOutLeft');
        bg.classList.add('animated', 'fadeOut');

        menu.onanimationend = () => {
            if (!isOpen) {
                menu.classList.remove('open');
                bg.classList.remove('open');

                menu.classList.remove('animated', 'fadeOutLeft');
                bg.classList.remove('animated', 'fadeOut');
            }
        }
    }
}