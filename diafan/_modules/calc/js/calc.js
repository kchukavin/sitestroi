

$(document).ready(function() {

    const calcUpdate = function () {
        

        let $resultText = $('.calc__total .calc__value');
        let $resultInput = $('.calc__form .calc__hidden-input');

        let coursePrice = $('.calc select[name=course] option:selected').data('price');
        let ageValue = $('.calc select[name=age] option:selected').val();
        let warrantyValue = $('.calc input[name=warranty]').val();

        let formValue = "Параметры заказа:\n";


        $('.calc select option:selected, .calc .calc__row input').each(function () {
            
            let value = $(this).text();
            if (!value) value = $(this).parent('label').text() + " " + $(this).val();
            formValue += value  + "\n";
        });

        let total = coursePrice;

        switch (ageValue) {
            case '1':
                break;
            case '2':
                total += coursePrice * 0.30; // + 30%
                break;
            case '3':
                total += coursePrice * 0.50; // + 50%
                break;
        }


        total += warrantyValue*300;

        $resultText.text(total + ' р.');

        formValue = "Заказ на сумму: " + total + " т.р.\n\n" + formValue;

        $resultInput.val(formValue);
    };
    
    calcUpdate();

    $('.calc select').change(calcUpdate);
    $('.calc input').change(calcUpdate);
});
