<!DOCTYPE html>
<html>
<head>
    <title>Track My Actions </title>
    <!-- ddding the Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Manage Your Task Easily with Track My Actions</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Task</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="taskList">
            <!-- table body -->
            </tbody>
        </table>
        <div class="text-right">
            <button id="addTaskButton" class="btn btn-primary">
                <i class="fa fa-plus"></i> Create a New Task
            </button>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        const taskList = document.getElementById("taskList");
        let rowNumber = 1;

        // Function to add a new task to the list
        function addNewTask() {
            const taskText = prompt("Enter a new task:");
            if (taskText) {
                const newRow = taskList.insertRow();
                newRow.innerHTML = `
                    <td>${rowNumber++}</td>
                    <td>${taskText}</td>
                    <td>
                        <button class="btn btn-danger deleteTask">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                        <button class="btn btn-primary editTask">
                            <i class="fa fa-pencil-alt"></i> Edit
                        </button>
                    </td>
                `;

                attachTaskHandlers(newRow);
                showMessage("Your task has been added successfully.");
            }
        }

        // Function to attach event handlers to task rows
        function attachTaskHandlers(taskRow) {
            taskRow.querySelector(".deleteTask").addEventListener("click", () => deleteTask(taskRow));
            taskRow.querySelector(".editTask").addEventListener("click", editTask);
        }

        // Function to display a feedback message
        function showMessage(message) {
            alert(message);
        }

        // Function to delete a task
        function deleteTask(taskRow) {
            taskList.deleteRow(taskRow.rowIndex);
            showMessage("Your task has been Deleted Successfully.");
            updateRowNumbers();
        }

        // Function to edit a task
        function editTask() {
            const taskRow = this.parentElement.parentElement;
            const taskCell = taskRow.cells[1];
            const taskText = taskCell.textContent;
            const newTaskText = prompt("Edit the task:", taskText);
            if (newTaskText) {
                taskCell.textContent = newTaskText;
                showMessage("Your task has been Updated Successfully.");
            }
        }

        // Function to update row numbers
        function updateRowNumbers() {
            rowNumber = 1;
            const rows = taskList.querySelectorAll("tr");
            for (let i = 1; i < rows.length; i++) {
                rows[i].cells[0].textContent = rowNumber++;
            }
        }

        // Attach click event to the "Add New Task" button
        document.getElementById("addTaskButton").addEventListener("click", addNewTask);
    </script>
</body>
</html>
