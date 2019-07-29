$('#addReservationModal').on('show.bs.modal', function (event) {
    const id = $('#facility-name').val();
    const modal = $(this);
    modal.find('#from-addReservation').attr('action', `/facilities/${id}/reservations`);
})
