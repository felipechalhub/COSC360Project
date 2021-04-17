

var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);

}
// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

	const themeStylesheet = document.getElementById('theme');
	const themeToggle = document.getElementById('theme-toggle');
	themeToggle.addEventListener('click', () => {
		// if it's light -> go dark
		if (themeStylesheet.href.includes('light')) {
			themeStylesheet.href = 'dark-theme.css';
			themeToggle.innerText = 'Switch to light mode';
		} else {
			// if it's dark -> go light
			themeStylesheet.href = 'light-theme.css';
			themeToggle.innerText = 'Switch to dark mode';

		}
	})
})
button.addEventListener('click', () => {
	document.body.classList.toggle('dark');
	localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
});

if (localStorage.getItem('theme') === 'dark') {
	document.body.classList.add('dark');
}
