@extends('layouts.default')
@section('pageTitle')
Mahasiswa
@endsection

@section('styleScript')
<style>
    /* Add your custom styles here if needed */
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if ("{{ session('success') }}") {
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
            });
        }
    });
</script>
@endif

@if (session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if ("{{ session('error') }}") {
            Swal.fire({
                icon: 'error',
                title: "{{ session('error') }}",
            });
        }
    });
</script>
@endif

<script>
    var dataMahasiswas = @json($mahasiswaTable);

    document.addEventListener('DOMContentLoaded', function() {
        let tabel = document.getElementById('records');
        for (let i = 0; i < dataMahasiswas.length; i++) {
            tabel.innerHTML +=
                `
        <tr id="row${i}" class="border-solid border-2 border-neutral-300/70">
                <td>
                    ${i+1}
                </td>
                <td>
                ${dataMahasiswas[i]['nama']}
                </td>
                <td>
                ${dataMahasiswas[i]['nrp']}
                </td>
                <td>
                ${dataMahasiswas[i]['gpa']}
                </td>
                <td>
                ${dataMahasiswas[i]['semester']}
                </td>
                <td class="justify-center content-center items-center text-center">
                <button id="edit${i}" onclick="editRecords(edit${i})" class="h-8 w-20 font-bold rounded-t-md rounded-b-md bg-yellow-400 text-md justify-center items-center text-center text-cyan-800">
                        edit
                </button>                    
                </td>
                <td>
                <input id="delete${i}"  onclick="deleteRecords(delete${i})" type="checkbox" name="idsDelete[]" class="h-8 w-20 font-bold rounded-t-md rounded-b-md bg-red-400 text-md cursor-pointer">
                </td>
            </tr>
        `;
        }
    })

    let currentlyHighlightedRow = null;

    function editRecords(buttonID) {
        let rowKe = buttonID.id.replace('edit', '');
        let currentRow = document.getElementById(`row${rowKe}`);

        // Check if there's a previously highlighted row
        if (currentlyHighlightedRow) {
            // Remove the highlight from the previously highlighted row
            currentlyHighlightedRow.style.backgroundColor = '';
            currentlyHighlightedRow.innerHTML = `
        <td>
                    ${rowKe+1}
                </td>
                <td>
                ${dataMahasiswas[rowKe]['nama']}
                </td>
                <td>
                ${dataMahasiswas[rowKe]['nrp']}
                </td>
                <td>
                ${dataMahasiswas[rowKe]['gpa']}
                </td>
                <td>
                ${dataMahasiswas[rowKe]['semester']}
                </td>
                <td class="justify-center content-center items-center text-center">
                <button id="edit${rowKe}" onclick="editRecords(edit${rowKe})" class="h-8 w-20 font-bold rounded-t-md rounded-b-md bg-yellow-400 text-md justify-center items-center text-center text-cyan-800">
                        edit
                </button>                    
                </td>
                <td>
                <input id="delete${rowKe}"  onclick="deleteRecords(delete${rowKe})" type="checkbox" name="idsDelete[]" class="h-8 w-20 font-bold rounded-t-md rounded-b-md bg-red-400 text-md cursor-pointer">
                </td>
        `;
        }

        // Set the background color of the current row
        currentRow.style.backgroundColor = "rgba(173, 216, 230, 0.7)";

        // Update the currently highlighted row
        currentlyHighlightedRow = currentRow;

        currentRow.innerHTML = `
    <td>
                    ${rowKe+1}
                </td>
                <td>
                <input id="editNama" type="text" class="flex-1 bg-slate-300/50 p-2 rounded-md" value="${dataMahasiswas[rowKe]['nama']}">
                </td>
                <td>
                <input id="editNrp" type="text" class="flex-1 bg-slate-300/50 p-2 rounded-md" value="${dataMahasiswas[rowKe]['nrp']}">
                </td>
                <td>
                <input id="editGpa" type="number" step="0.01" class="flex-1 bg-slate-300/50 p-2 rounded-md" value="${dataMahasiswas[rowKe]['gpa']}">
                </td>
                <td>
                <input id="editSemester" value="${dataMahasiswas[rowKe]['semester']}" type="number" class="flex-1 bg-slate-300/50 p-2 rounded-md">
                </td>
                <td class="justify-center content-center items-center text-center">
                <button id="edit${rowKe}" onclick="editRecords(edit${rowKe})" class="h-8 w-20 font-bold rounded-t-md rounded-b-md bg-yellow-400 text-md justify-center items-center text-center text-cyan-800">
                        edit
                </button>                    
                </td>
                <td>
                <input id="delete${rowKe}" type="checkbox" name="idsDelete[]" class="h-8 w-20 font-bold rounded-t-md rounded-b-md bg-red-400 text-md cursor-pointer">
                </td>
                <input id="passID" type="hidden" value="${dataMahasiswas[rowKe]['id']}">
    `;
    }
    let mauDelete = []; //JIKA SUDAH DELETE HAPUS ROW YANG DI DELETE ITU

    function deleteRecords(buttonID) {
        let rowKedel = buttonID.id.replace('delete', '');
        let currentRowdel = document.getElementById(`row${rowKedel}`);

        if (buttonID.checked) { //jika pas di change dia berubah ke checked maka do ini
            mauDelete.push(dataMahasiswas[rowKedel]['id']);
        } else {
            mauDelete.splice(mauDelete.indexOf(dataMahasiswas[rowKedel]['id']), 1);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        let formku = document.getElementById('myForm');

        document.getElementById('tambah').addEventListener('click', function() {
            formku.innerHTML = `<form action="{{ url('/mahasiswa') }}" method="POST" class="w-full max-w-md flex flex-col gap-3 justify-center items-center">
@csrf
        <div class="w-full flex items-center gap-2">
            <label for="nama" class="w-24">Nama:</label>
            <input id="nama" placeholder="Nama Mahasiswa" name="nama_mhs" type="text" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="nrp" class="w-24">NRP:</label>
            <input id="nrp" placeholder="NRP" type="text" name="nrp_mhs" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="gpa" class="w-24">GPA:</label>
            <input id="gpa" placeholder="GPA" type="number" name="gpa_mhs" value="0.00" step="0.01" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="semester" class="w-24">Semester:</label>
            <input id="semester" placeholder="Semester" type="number" name="sem_mhs" value="1" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <button id="postData" type="submit" class="h-14 w-20 font-bold rounded-3xl bg-zinc-600 text-xl hover:bg-zinc-600/60 focus:bg-zinc-600/60">post!</button>
        </form>`;
        });

        document.getElementById('ubah').addEventListener('click', function() {
            try{
            formku.style.display = 'none';

            formku.innerHTML = `<form action="{{ url('/mahasiswa') }}" method="POST" class="w-full max-w-md flex flex-col gap-3 justify-center items-center">
@csrf
@method('PUT')
        <div class="w-full flex items-center gap-2">
            <label for="nama" class="w-24">Nama:</label>
            <input id="nama" value="${document.getElementById('editNama').value}" placeholder="Nama Mahasiswa" name="nama_mhs" type="text" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="nrp" class="w-24">NRP:</label>
            <input id="nrp" value="${document.getElementById('editNrp').value}" placeholder="NRP" type="text" name="nrp_mhs" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="gpa" class="w-24">GPA:</label>
            <input id="gpa" placeholder="GPA" type="number" name="gpa_mhs" value="${document.getElementById('editGpa').value}" step="0.01" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="semester" class="w-24">Semester:</label>
            <input id="semester" placeholder="Semester" type="number" name="sem_mhs" value="${document.getElementById('editSemester').value}" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>

        <input id="passIDKesini" type="hidden" name="id" value="${document.getElementById('passID').value}">
        <button id="postData" type="submit" class="h-14 w-20 font-bold rounded-3xl bg-zinc-600 text-xl hover:bg-zinc-600/60 focus:bg-zinc-600/60">post!</button>
        </form>`;
            document.getElementById('postData').click();
            }catch(error){
                Swal.fire({
            icon: 'error',
            title: 'Belum Memilih Records untuk Update'
        });
            }
        });

        document.getElementById('hapus').addEventListener('click', function() {
            // Hide the existing form
            formku.style.display = 'none';

            // Create a new form dynamically
            formku.innerHTML = `
    <form action="{{ url('/mahasiswa') }}" id="sini" method="POST" class="w-full max-w-md flex flex-col gap-3 justify-center items-center">
        @csrf
        @method('DELETE')
    </form>
`;

            // Get the new form element
            const newForm = document.getElementById('sini');
            // Add hidden input elements for each ID in the mauDelete array
            mauDelete.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'idsDelete[]';
                input.value = id;
                newForm.appendChild(input);
            });

            // Add the submit button to the form
            const submitButton = document.createElement('button');
            submitButton.id = 'postData';
            submitButton.type = 'submit';
            submitButton.className = 'h-14 w-20 font-bold rounded-3xl bg-zinc-600 text-xl hover:bg-zinc-600/60 focus:bg-zinc-600/60';
            submitButton.textContent = 'post!';
            newForm.appendChild(submitButton);

            // Programmatically click the submit button to submit the form
            submitButton.click();

        });
    });
</script>
@endsection

@section('isiPage')
<div class="w-screen flex-column justify-center h-full">
    <div class="w-screen flex-1 flex mt-2 items-start gap-10 justify-center h-3/5">
        <table id="records" class="gap-10 w-11/12 border-solid border-2 border-neutral-300/70 bg-slate-200/50">
            <tr class="border-solid border-2 border-neutral-400">
                <th>
                    No
                </th>
                <th>
                    Nama Lengkap
                </th>
                <th>
                    NRP
                </th>
                <th>
                    GPA
                </th>
                <th>
                    Semester
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
            </tr>

        </table>
    </div>

    <div class="w-screen flex-1 flex gap-10 mb-4 justify-center">
        <button id="tambah" class="h-14 w-20 font-bold rounded-t-3xl rounded-b-md bg-green-400 text-xl hover:animate-bounce active:bg-pink-300 active:animate-none focus:bg-pink-300 focus:animate-none"> Add </button>
        <button id="ubah" class="h-14 w-20 font-bold rounded-t-3xl rounded-b-md bg-yellow-400 text-xl hover:animate-bounce active:bg-pink-300 active:animate-none focus:bg-pink-300 focus:animate-none"> Update </button>
        <button id="hapus" class="h-14 w-20 font-bold rounded-t-3xl rounded-b-md bg-red-500 text-xl hover:animate-bounce active:bg-pink-300 active:animate-none focus:bg-pink-300 focus:animate-none"> Delete </button>
    </div>

    <div id="myForm" class="w-screen flex-1 flex flex-col gap-3 justify-center items-center">
        <!-- <form action="{{ url('/mahasiswa') }}" method="POST" class="w-full max-w-md flex flex-col gap-3 justify-center items-center">
@csrf
        <div class="w-full flex items-center gap-2">
            <label for="nama" class="w-24">Nama:</label>
            <input id="nama" placeholder="Nama Mahasiswa" name="nama_mhs" type="text" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="nrp" class="w-24">NRP:</label>
            <input id="nrp" placeholder="NRP" type="text" name="nrp_mhs" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="gpa" class="w-24">GPA:</label>
            <input id="gpa" placeholder="GPA" type="number" name="gpa_mhs" value="0" step="0.1" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="semester" class="w-24">Semester:</label>
            <input id="semester" placeholder="Semester" type="number" name="sem_mhs" value="1" class="flex-1 bg-slate-300/50 p-2 rounded-md">
        </div>
        <button id="postData" type="submit" class="h-14 w-20 font-bold rounded-3xl bg-zinc-600 text-xl hover:bg-zinc-600/60 focus:bg-zinc-600/60">post!</button>
        </form> -->
    </div>
</div>
@endsection