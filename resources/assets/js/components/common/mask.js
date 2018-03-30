import Inputmask from 'inputmask';

Array.prototype.forEach.call(
    document.querySelectorAll('[data-mask="currency"]'),
    el => {
        Inputmask('numeric', {
            groupSeparator: ' ',
            digits: 0,
            rightAlign: false,
            autoGroup: true
        }).mask(el);
    }
);

