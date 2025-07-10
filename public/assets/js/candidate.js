document.addEventListener("DOMContentLoaded", () => {
    let candidateCount = 0;
    const addBtn = document.getElementById("addCandidateBtn");
    const wrapper = document.getElementById("candidatesWrapper");
    const tableWrapper = document.getElementById("candidateTableWrapper");
    const tableBody = document.querySelector("#candidateTable tbody");
    const categoryInput = document.getElementById("categoryName");

    addBtn.addEventListener("click", (e) => {
        e.preventDefault();

        // Ensure category name is filled
        if (!categoryInput.value.trim()) {
            alert("Please fill in the Category Name before adding candidates.");
            return;
        }

        // Check if last candidate is filled
        const lastCandidate = wrapper.lastElementChild;
        if (lastCandidate) {
            const fullName = lastCandidate.querySelector(".full-name")?.value.trim();
            const alias = lastCandidate.querySelector(".alias")?.value.trim();

            if (!fullName || !alias) {
                alert("Please complete the previous candidate’s Full Name and Alias.");
                return;
            }
        }

        candidateCount++;
        const candidateId = candidateCount;

        // Candidate input block
        const candidateBlock = document.createElement("div");
        candidateBlock.className = "candidate-block position-relative mt-5";
        candidateBlock.setAttribute("data-id", candidateId);
        candidateBlock.innerHTML = `
            <div class="position-absolute top-0 start-0 translate-middle ps-5">
                <label class="form-label fw-medium mb-2 bg-gradient p-2 px-5 rounded-4">Candidate ${candidateId}:</label>
            </div>
            <div class="p-3 border border-p rounded-3 pt-4">
                <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control full-name" placeholder="Full Name">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control alias" placeholder="a.k.a">
                </div>
                <div class="col-12 mb-3">
                    <input type="file" class="form-control">
                </div>
                </div>
            </div>
        `;

        wrapper.appendChild(candidateBlock);

        const fullNameInput = candidateBlock.querySelector(".full-name");
        const aliasInput = candidateBlock.querySelector(".alias");

        const row = document.createElement("tr");
        row.setAttribute("data-id", candidateId);
        row.innerHTML = `
      <td class="text-center">${candidateId}.</td>
      <td class="full-name-td"></td>
      <td class="alias-td"></td>
      <td class="text-center">
        <button type="button" class="btn btn-sm btn-danger delete-btn">Delete</button>
      </td>
    `;
        tableBody.appendChild(row);
        tableWrapper.classList.remove("d-none");

        // Update row on input
        fullNameInput.addEventListener("input", () => updateTable(candidateId, fullNameInput.value, aliasInput.value));
        aliasInput.addEventListener("input", () => updateTable(candidateId, fullNameInput.value, aliasInput.value));

        // Delete candidate
        row.querySelector(".delete-btn").addEventListener("click", () => {
            row.remove();
            candidateBlock.remove();
            updateSerialNumbers();

            if (tableBody.children.length === 0) {
                tableWrapper.classList.add("d-none");
                candidateCount = 0;
            }
        });

        updateSerialNumbers();
    });

    function updateTable(id, fullName, alias) {
        const row = tableBody.querySelector(`tr[data-id="${id}"]`);
        if (row) {
            row.querySelector(".full-name-td").textContent = fullName;
            row.querySelector(".alias-td").textContent = alias;
        }
    }

    function updateSerialNumbers() {
        Array.from(tableBody.children).forEach((row, index) => {
            row.querySelector("td").textContent = `${index + 1}.`;
        });
    }
});
