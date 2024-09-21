// document.querySelectorAll('.read-more').forEach(link => {
//     link.addEventListener('click', function(e) {
//         e.preventDefault(); // Prevent default anchor behavior
//         const moreText = this.previousElementSibling;

//         // Toggle the display of the additional text
//         if (moreText.style.display === 'none' || moreText.style.display === '') {
//             moreText.style.display = 'inline';
//             this.textContent = 'Read less';
//         } else {
//             moreText.style.display = 'none';
//             this.textContent = 'Read more';
//         }
//     });
// });

document.querySelectorAll('.read-more').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        const moreText = this.previousElementSibling; // Get the associated text

        // Toggle the open class
        moreText.classList.toggle('open');

        // Change the link text
        this.textContent = moreText.classList.contains('open') ? 'Read less' : 'Read more';
    });
});
