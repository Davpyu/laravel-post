document.querySelector('#menu').addEventListener('click', () => {
    const nav = document.querySelector('#nav').classList;
    nav.forEach(element => {
        if (element === 'hidden') {
            nav.replace('hidden', 'block');
        } else if (element === 'block') {
            nav.replace('block', 'hidden');
        }
    });
});