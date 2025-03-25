define(['jquery','Magento_Ui/js/modal/alert'], function ($,Malert) {
    'use strict';

    return function () {
        
        $(document).ready( function() { 


            // show/hide marks
            $('#show_mark').on('click', function () {
                $('ul li').toggle();
                $('table tbody tr').toggle();
            });

            // high mark button
            $('#highest_mark').on('click', function () {
                
                let highest = 0.0;
                let index =0;
                let indexMaxHigh=0;
                // $('table tbody tr td:nth-child(3)').each(function () {
                $('table tbody tr').each(function () {
                    let mark = parseFloat($(this).find('td:nth-child(3)').text());
                    index+=1;
                    if (mark > highest) {
                        highest = mark;
                        indexMaxHigh=index;
                    }
                });
                $('table tbody tr:nth-child('+indexMaxHigh+') td').each(function(){
                    $(this).css({'background':'#4caf50','font-weight': 'bolder'});
                });
                // Malert('High mark: ' +$('table tbody tr:nth-child('+indexMaxHigh+')').children('td:last-child').text() +' - Student: '+$(this).children('td:first-child').text());
                console.log('High mark: '+highest+ ' en la fila '+indexMaxHigh);
                // Malert('High Mark: ');
                Malert({
                    title: $.mage.__('High Mark'),
                    content: $.mage.__($('table tbody tr:nth-child('+indexMaxHigh+')').children('td:last-child').text() +' - Student: '+$('table tbody tr:nth-child('+indexMaxHigh+')').children('td:first-child').text()+' '+$('table tbody tr:nth-child('+indexMaxHigh+')').children('td:nth-child(2)').text()),
                    actions: {
                        always: function(){}
                    }
                });
            
                
            });
        });
    };
});
