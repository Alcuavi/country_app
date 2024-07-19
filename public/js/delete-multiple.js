document.getElementById('select-all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}

document.getElementById('delete-selected').onclick = function(e) {
    e.preventDefault();
    var form = document.getElementById('delete-multiple-form');
    form.submit();
}
