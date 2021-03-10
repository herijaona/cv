$(document).ready(function(){
  $('#CandidateInscription').on('submit', function(e){
    e.preventDefault()
    let nom =  $('#CandidateNom').val();
    let prenom =  $('#CandidatePrenom').val();
    let email =  $('#CandidateEmail').val();
    let password = $('#CandidateEmail').val();
    
    let json = JSON.stringify({
      "nom": nom,
      "prenom": prenom,
      "email": email,
      "password": password
    });

    $.ajax({

      url: "/api/candidate",      
      data: json,
      async: true,
      contentType: 'application/json',
      cache: false,
      dataType: 'json',
      method: 'post',
      success: function (response) {
          alert(response)
      },
      error: function (response) {
        console.log(response)
        alert('Votre adresse email est deja utiliser! Veuillez le changer');
      }
    })

  })

  $('#EmployerInscription').on('submit', function(e){
    e.preventDefault()
    let nom =  $('#EmployerNom').val();
    let prenom =  $('#EmployerPrenom').val();
    let email =  $('#EmployerEmail').val();
    let password = $('#EmployerPassword').val();
    let nomSociete = $('#EmployerNomSociete').val();
    
    let json = JSON.stringify({
      "nom": nom,
      "prenom": prenom,
      "nomsociete": nomSociete,
      "email": email,
      "password": password
    });
    console.log(json);
    
    $.ajax({

      url: "/api/employer",      
      data: json,
      async: true,
      contentType: 'application/json',
      cache: false,
      dataType: 'json',
      method: 'post',
      success: function (response) {
          alert(response)
      },
      error: function (response) {
        console.log(response)
        alert('Votre adresse email est deja utiliser! Veuillez le changer');
      }
    });
    

  });
});