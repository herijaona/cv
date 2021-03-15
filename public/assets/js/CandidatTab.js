$(document).ready(function () {
    $('#tableauDebord').show();
    $('#MomProfile').hide();
    $('#Myresume').hide();
    $('#Applied').hide();
    $('#SaveJobs').hide();
    $('#AlertJobs').hide();


    $('.TableauDeBord').on('click', function () {
        $('#tableauDebord').show();
        $('#MomProfile').hide();
        $('#Myresume').hide()
        $('#Applied').hide();
        $('#SaveJobs').hide();
        $('#AlertJobs').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.MonProfile').on('click', function () {
        $('#MomProfile').show();
        $('#tableauDebord').hide();
        $('#Myresume').hide()
        $('#Applied').hide();
        $('#SaveJobs').hide();
        $('#AlertJobs').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.Resumer').on('click', function () {
        $('#MomProfile').hide();
        $('#Myresume').hide();
        $('#Applied').hide();
        $('#SaveJobs').hide();
        $('#AlertJobs').hide();
        $('#Myresume').show();
        $('#tableauDebord').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.AppliJobs').on('click', function () {
        $('#MomProfile').hide();
        $('#Myresume').hide();
        $('#AlertJobs').hide();
        $('#Applied').show();
        $('#SaveJobs').hide();
        $('#tableauDebord').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.SvgEmploye').on('click', function () {
        $('#MomProfile').hide();
        $('#Myresume').hide();
        $('#AlertJobs').hide();
        $('#Applied').hide();
        $('#SaveJobs').show();
        $('#tableauDebord').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.AlertEmploye').on('click', function () {
        $('#MomProfile').hide();
        $('#Myresume').hide();
        $('#Applied').hide();
        $('#SaveJobs').hide();
        $('#AlertJobs').show();
        $('#tableauDebord').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('#cv_form').submit(function (event) {
        event.preventDefault();
    });

    $('.experience').on('click', function () {
        let content = document.querySelector('.formexpcontent');
        let form = document.querySelector('.formexp');
        let copy = form.cloneNode(form);
        content.appendChild(copy);
    });

    $('.education').on('click', function () {
        let content = document.querySelector('.FormEcoleContent');
        let form = document.querySelector('.FormEcole');
        let copy = form.cloneNode(form);
        content.appendChild(copy);
    });




});