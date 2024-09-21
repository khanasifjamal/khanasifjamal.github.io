document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.nav-link');
    let lastId = null;
    let scrollTimeout = null;

    function setActiveNavItem(id) {
        navLinks.forEach(link => {
            link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
        });
    }

    // Click event for nav links
    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - document.querySelector('.navbar').offsetHeight,
                    behavior: 'smooth'
                });

                setActiveNavItem(targetId);
            }
        });
    });

    // Scroll event for highlighting based on viewport
    window.addEventListener('scroll', () => {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }

        scrollTimeout = setTimeout(() => {
            const fromTop = window.pageYOffset + document.querySelector('.navbar').offsetHeight + 1;

            let current = null;
            document.querySelectorAll('section').forEach(section => {
                if (section.offsetTop < fromTop) {
                    current = section.id;
                }
            });

            if (current && current !== lastId) {
                lastId = current;
                setActiveNavItem(current);
            }
        }, 10);
    });
});


// Close the navbar on mobile after clicking a nav item
document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
    link.addEventListener('click', () => {
      // Check if the navbar-toggler is present
      const toggler = document.querySelector('.navbar-toggler');
  
      // If the navbar-toggler exists, close the navbar
      if (toggler && document.querySelector('.navbar-collapse').classList.contains('show')) {
        toggler.click();
      }
    });
  });
  
