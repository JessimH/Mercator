function toggle() {
    let body = document.getElementById('body');
    let navigation = document.getElementById('navigation');
    body.classList.toggle('active');
    navigation.classList.toggle('active');
    console.log('RESPONSIVE NAV');
}