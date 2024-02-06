/*SweetAlert Init*/

$(function() {
	"use strict";

	var SweetAlert = function() {};

    //examples
    SweetAlert.prototype.init = function() {

    //Basic
    $('#sa-basic').on('click',function(e){
	    swal({
			title: "Here's a message!",
            confirmButtonColor: "#2879ff",
        });
		return false;
    });

    //A title with a text under
    $('#sa-title').on('click',function(e){
	    swal({
			title: "Here's a message!",
            text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#2879ff",
        });
		return false;
    });

    //Success Message
	$('#sa-success').on('click',function(e){
        swal({
			title: "good job!",
             type: "success",
			text: "Lorem ipsum dolor sit amet",
			confirmButtonColor: "#01c853",
        });
		return false;
    });

    //Warning Message
    $('#sa-warning,.sa-warning').on('click',function(e){
	    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#fec107",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function(){
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
        });
		return false;
    });

    //Parameter
	$('#sa-params').on('click',function(e){
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#fec107",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
		return false;
    });

    //Custom Image
	$('#sa-image').on('click',function(e){
		swal({
            title: "John!",
            text: "Recently joined twitter",
            imageUrl: "dist/img/user.png" ,
			confirmButtonColor: "#e91e63",

        });
		return false;
    });

    //Auto Close Timer
	$('#sa-close').on('click',function(e){
        swal({
            title: "Auto close alert!",
            text: "I will close in 2 seconds.",
            timer: 2000,
            showConfirmButton: false
        });
		return false;
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert;

	$.SweetAlert.init();
});




/************************* MES EVENEMENTS LIEES AVEC LIVEWIRE CYCLE *****************************/


    window.addEventListener('swal:modalMessage', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            type: event.detail.type
        });
    });

    window.addEventListener('swal:modalDeleteRole', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            type: event.detail.type,
            showCancelButton: true,
            confirmButtonColor: "#fec107",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
            window.Livewire.emit('DeleteRole',event.detail.id);
            } else {
                swal("Annuler", "Vous venez d'annuler cette Action", "error");
            }
        });
    });
    window.addEventListener('swal:modalDeleteRole', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            type: event.detail.type,
            showCancelButton: true,
            confirmButtonColor: "#fec107",
            confirmButtonText: "supprimer",
            cancelButtonText: "Annuler",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
            window.Livewire.emit('DeleteChantier',event.detail.id);
            } else {
                swal("Annuler", "Vous venez d'annuler cette Action", "error");
            }
        });
    });
    window.addEventListener('swal:modalRole_exist_deja', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "Restaurer",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('Restore_role',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});

window.addEventListener('swal:modalVerif_UserExist', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "restaurer",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('Restore_user',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});

window.addEventListener('swal:modalDelete_user', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "oui supprimer !",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('suppression_utilisateur',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});

window.addEventListener('swal:modalDelete_Lot', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "oui je veux !",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('suppression_Lot',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});

window.addEventListener('swal:modalDelete_TypeBien', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "oui je veux !",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('suprimeTypeBien',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});
window.addEventListener('swal:modalDelete_operationImmo', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "oui supprimer !",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('suprime_operationImmo',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});
window.addEventListener('swal:modalDelete_Ilot', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "oui supprimer !",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('supprimer_ilot',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});

window.addEventListener('alertMessageTop', event => {
    toastr.success(event.detail.message, event.detail.type, {
        positionClass: "toast-top-center",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
});


window.addEventListener('swal:modalopi_existExist', event => {
        swal({
        title: event.detail.title,
        text: event.detail.text,
        type: event.detail.type,
        showCancelButton: true,
        confirmButtonColor: "#fec107",
        confirmButtonText: "Restaurer !",
        cancelButtonText: "Annuler",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
           window.Livewire.emit('RestoreOperation_imo',event.detail.id);
        } else {
            swal("Annuler", "Vous venez d'annuler cette Action", "error");
        }
    });
});





window.addEventListener('closeModaleModifySousCategorie' , event => {
    $('#EditSousCategorie').modal('hide');
});
window.addEventListener('closeModaleModifyImageSousCategorie' , event => {
    $('#checkSubCategorie').modal('hide');
});
window.addEventListener('closeModalREchercheAvancer' , event => {
    $('#recherche_avancer').modal('hide');
});
window.addEventListener('closeModalModil_user' , event => {
    $('#editUser').modal('hide');
});

window.addEventListener('closeModalEditTypeBien' , event => {
    $('#ediTypeBien').modal('hide');
});

window.addEventListener('show_select_modify_opi' , event => {
    $('#modalSelectMOdifOPI').modal('show');
});
window.addEventListener('closeModalModifyInfos' , event => {
    $('#modalopi1').modal('hide');
});

window.addEventListener('CloseModalSelectOptionModifyOPI' , event => {
    $('#modalSelectMOdifOPI').modal('hide');
});

window.addEventListener('OpenmodalChargement_sauvegarde' , event => {
    $('#modalChargement_sauvegarde').modal('show');

    setTimeout(function () {
        $('#modalChargement_sauvegarde').modal('hide');
        }, 1000);
});

