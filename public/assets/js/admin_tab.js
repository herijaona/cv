$(document).ready(function(){
    $('#tableauDeBordAdmin').show();
    $('#listsJobs').hide()
    $('#listCanidats').hide() 
    $('#listsEmployeur').hide()       
    $('#listCvs').hide()

    $('.tableauDeBordAdmin').on('click', function(){
        $('#listsJobs').hide()
        $('#listCanidats').hide() 
        $('#listsEmployeur').hide()       
        $('#listCvs').hide()
        $('#tableauDeBordAdmin').show();
        $('.dashboard-menu, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.listJob').on('click', function(){
        $('#listsJobs').show()
        $('#listCanidats').hide() 
        $('#listsEmployeur').hide()       
        $('#listCvs').hide()
        $('#tableauDeBordAdmin').hide();
        $('.dashboard-menu, li').removeClass('active');
        $(this).addClass('active');
    });  
    

    $('.listDesCandidate').on('click', function(){
        $('#listsJobs').hide()
        $('#listCanidats').show() 
        $('#listsEmployeur').hide()       
        $('#listCvs').hide()
        $('#tableauDeBordAdmin').hide();        
        $('.dashboard-menu, li').removeClass('active');
        $(this).addClass('active');
    });
    
    $('.listDesEmployeur').on('click', function(){
        $('#listsJobs').hide()
        $('#listCanidats').hide() 
        $('#listsEmployeur').show()       
        $('#listCvs').hide()
        $('#tableauDeBordAdmin').hide();       
        $('.dashboard-menu, li').removeClass('active');
        $(this).addClass('active');
    });

    $('.listdesCv').on('click', function(){
        $('#listsJobs').hide()
        $('#listCanidats').hide() 
        $('#listsEmployeur').hide()       
        $('#listCvs').show()
        $('#tableauDeBordAdmin').hide();
        $('.dashboard-menu, li').removeClass('active');
        $(this).addClass('active');
    });
    
})