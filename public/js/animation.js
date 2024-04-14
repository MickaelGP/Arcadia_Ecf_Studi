
const ratio = .2
const options = {
    root: null,
    rootMargin: "0px",
    threshold: ratio,
};
const handleIntersect = function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal-visible');
            observer.unobserve(entry.target);
        }
    });
}
const observer = new IntersectionObserver(handleIntersect, options);

document.querySelectorAll('.reveal').forEach(function (r) {
    observer.observe(r);
});
document.addEventListener('DOMContentLoaded', function () {
    let alertSuccess = document.querySelector('#alertSuccess');
    if (alertSuccess) {
        setTimeout(() => {
            alertSuccess.remove();
        }, 3000);
    }
});