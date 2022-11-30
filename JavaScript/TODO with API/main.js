import { deleteData, fetchData, postData, putData } from "./src/crud.js";

const addTaskModalEl = document.getElementById('addTaskModal');
const addTaskModal = new bootstrap.Modal(addTaskModalEl);
const editTaskModalEl = document.getElementById('editTaskModal');
const editTaskModal = new bootstrap.Modal(editTaskModalEl);

const addTaskModalBtn = document.querySelector('#addTaskModalBtn');
addTaskModalBtn.addEventListener('click', () => addTaskModal.show());

function displayData(tasks) {
    console.log(tasks);
    const taskContainer = document.querySelector(".tasks");
    let taskDiv = "";
    tasks.forEach(task => {
        taskDiv += `<div class="task card mb-2 p-4" task-id="${task.id}">
            <h2>${task.text}</h2>
            <h3>${task.date}</h3>
            <p>${task.description}</p>
            <span class="options d-flex justify-content-around">
                <i class="fas fa-edit m-1 p-2"></i>
                <i class="fas fa-trash-alt m-1 p-2"></i>
            </span>
        </div>`
    });
    taskContainer.innerHTML = taskDiv;
    const taskElements = taskContainer.querySelectorAll('[task-id]');
    taskElements.forEach(node => {
        const editBtn = node.querySelector('.fa-edit');
        const delBtn = node.querySelector('.fa-trash-alt');
        editBtn.addEventListener('click', () => editTaskModalCall(node.getAttribute('task-id')))
        delBtn.addEventListener('click', () => {
            // node.remove();
            deleteData(node.getAttribute('task-id')).then(data => displayData(data));
        });
        // console.log(editBtn.target)
    })
}

function editTaskModalCall(id) {
    const taskContainer = document.querySelector(".tasks");
    const taskElement = taskContainer.querySelector(`[task-id="${id}"]`);
    document.querySelector('#edit-task').value = taskElement.querySelector('h2').innerText;
    document.querySelector('#edit-date').value = taskElement.querySelector('h3').innerText;
    document.querySelector('#edit-description').value = taskElement.querySelector('p').innerText;
    document.querySelector('#edit-form').setAttribute('task-id', id);
    const errorDiv = document.querySelector(".edit-error");
    errorDiv.innerText = '';
    editTaskModal.show();
}

const formEditTask = document.querySelector('#edit-form');
formEditTask.onsubmit = async (event) => {
    event.preventDefault();
    const errorDiv = document.querySelector(".edit-error");
    const textInput = document.querySelector("#edit-task").value;
    const taskId = event.target.getAttribute('task-id');
    if (textInput === "") {
        errorDiv.textContent = "Įveskite užduoties pavadinimą";
    } else {
        const descriptionInput = document.querySelector("#edit-description").value;
        const dateInput = document.querySelector("#edit-date").value;
        const data = {
            text: textInput,
            date: dateInput,
            description: descriptionInput,
            id: +taskId,
        }
        putData(data).then(response => {
            if (response.find(item => item.id === data.id)) {
                errorDiv.textContent = "Sėkmingai išsaugota.";
                setTimeout(() => {
                    editTaskModal.hide();
                    displayData(response);
                }, 2000);
            } else {
                errorDiv.textContent = "Išsaugoti nepavyko...";
            }
        });
    }
}

const formAddTask = document.querySelector("#add-form");
formAddTask.onsubmit = async (event) => {
    event.preventDefault();
    const errorDiv = document.querySelector(".add-error");
    const textInput = document.querySelector("#add-task").value;
    if (textInput === "") {
        errorDiv.textContent = "Įveskite užduoties pavadinimą";
    } else {
        const descriptionInput = document.querySelector("#add-description").value;
        const dateInput = document.querySelector("#add-date").value;
        const data = {
            text: textInput,
            date: dateInput,
            description: descriptionInput,
            id: Math.floor(Math.random() * 1000 + 1),
        }
        postData(data).then(response => {
            if (response.find(item => item.id === data.id)) {
                errorDiv.textContent = "Sėkmingai išsaugota.";
                setTimeout(() => {
                    addTaskModal.hide();
                    displayData(response);
                }, 2000);
            } else {
                errorDiv.textContent = "Išsaugoti nepavyko...";
            }
        });
    }
}

(() => {
    fetchData().then(data => displayData(data))
})();

// window.onload = function () {
//     addTaskModal.show();
//     setTimeout(() => {
//         addTaskModal.hide()
//     }, 1000);
// };

async function deleteAllData() {
    try {
        const data = await fetchData();
        data.forEach(id => deleteData(id));
    } catch (err) {
        console.log(err);
    }
}
// deleteAllData();
