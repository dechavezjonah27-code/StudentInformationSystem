document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('studentForm');
    const tableBody = document.querySelector('#studentsTable tbody');

    function fetchStudents(){
        fetch('fetch_students.php')
        .then(res => res.text())
        .then(data => tableBody.innerHTML = data);
    }

    fetchStudents();

    form.addEventListener('submit', e => {
        e.preventDefault();
        const id = document.getElementById('student_id').value;
        const first_name = document.getElementById('first_name').value;
        const last_name = document.getElementById('last_name').value;
        const email = document.getElementById('email').value;

        let formData = new FormData();
        formData.append('first_name', first_name);
        formData.append('last_name', last_name);
        formData.append('email', email);

        let url = 'add_student.php';
        if(id){
            formData.append('id', id);
            url = 'edit_student.php';
        }

        fetch(url, {method:'POST', body:formData})
        .then(res => res.text())
        .then(res => {
            if(res === 'success'){
                form.reset();
                document.getElementById('student_id').value='';
                fetchStudents();
            } else { alert('Error'); }
        });
    });

    tableBody.addEventListener('click', e => {
        if(e.target.classList.contains('delete')){
            const id = e.target.dataset.id;
            if(confirm('Are you sure?')){
                let formData = new FormData();
                formData.append('id', id);
                fetch('delete_student.php',{method:'POST',body:formData})
                .then(res=>res.text())
                .then(res=>{ if(res==='success') fetchStudents(); else alert('Error'); });
            }
        }

        if(e.target.classList.contains('edit')){
            const row = e.target.closest('tr');
            document.getElementById('student_id').value=row.children[0].innerText;
            document.getElementById('first_name').value=row.children[1].innerText;
            document.getElementById('last_name').value=row.children[2].innerText;
            document.getElementById('email').value=row.children[3].innerText;
        }
    });
});