$(document).ready(function () {
    $('#tableauDebord').show();
    $('#PostUnJob').hide();
    $('#AllJob').hide();
    $('#Applications').hide();
    $('#Packages').hide();
    $('#ChoisePackages').hide();
    $('#Resume').hide();
    $('#MomProfile').hide();

    $('.TableauDeBord').on('click', function () {
        $('#tableauDebord').show();
        $('#PostUnJob').hide();
        $('#AllJob').hide();
        $('#Applications').hide();
        $('#Packages').hide();
        $('#ChoisePackages').hide();
        $('#Resume').hide();
        $('#MomProfile').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.PosteEmploye').on('click', function () {
        $('#tableauDebord').hide();
        $('#PostUnJob').show();
        $('#AllJob').hide();
        $('#Applications').hide();
        $('#Packages').hide();
        $('#ChoisePackages').hide();
        $('#Resume').hide();
        $('#MomProfile').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.listEmploye').on('click', function () {
        $('#tableauDebord').hide();
        $('#PostUnJob').hide();
        $('#AllJob').show();
        $('#Applications').hide();
        $('#Packages').hide();
        $('#ChoisePackages').hide();
        $('#Resume').hide();
        $('#MomProfile').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.Applications').on('click', function () {
        $('#tableauDebord').hide();
        $('#PostUnJob').hide();
        $('#AllJob').hide();
        $('#Applications').show();
        $('#Packages').hide();
        $('#ChoisePackages').hide();
        $('#Resume').hide();
        $('#MomProfile').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.Packages').on('click', function () {
        $('#tableauDebord').hide();
        $('#PostUnJob').hide();
        $('#AllJob').hide();
        $('#Applications').hide();
        $('#Packages').show();
        $('#ChoisePackages').hide();
        $('#Resume').hide();
        $('#MomProfile').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.ChoiPackages').on('click', function () {
        $('#tableauDebord').hide();
        $('#PostUnJob').hide();
        $('#AllJob').hide();
        $('#Applications').hide();
        $('#Packages').hide();
        $('#ChoisePackages').show();
        $('#Resume').hide();
        $('#MomProfile').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.Resumer').on('click', function () {
        $('#tableauDebord').hide();
        $('#PostUnJob').hide();
        $('#AllJob').hide();
        $('#Applications').hide();
        $('#Packages').hide();
        $('#ChoisePackages').hide();
        $('#Resume').show();
        $('#MomProfile').hide();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.Profile').on('click', function () {
        $('#tableauDebord').hide();
        $('#PostUnJob').hide();
        $('#AllJob').hide();
        $('#Applications').hide();
        $('#Packages').hide();
        $('#ChoisePackages').hide();
        $('#Resume').hide();
        $('#MomProfile').show();
        $('.slidebar1, li').removeClass('active');
        $(this).addClass('active');
    });
});