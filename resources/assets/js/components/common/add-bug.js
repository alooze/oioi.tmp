
Array.prototype.forEach.call(
  document.querySelectorAll('.add-bug-toggler'),
  toggler => toggler.addEventListener('click', e => {
    e.preventDefault()
    const active = toggler.classList.contains('active');
    if (active) {
        toggler.classList.remove('active');
        document.getElementById('add-bug').classList.remove('active');
        document.getElementById('add-bug').classList.remove('success');
    }else{
        toggler.classList.add('active');
        document.getElementById('add-bug').classList.add('active')
    }
  })
);
