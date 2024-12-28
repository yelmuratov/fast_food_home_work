<div>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2><strong>Give Salary</strong></h2>
                        <a class="btn btn-primary mt-2 mb-3" href="/fixedSalary" wire:navigate>
                            Back
                        </a>
                        <form wire:submit.prevent="giveSalaryTo">
                            <div class="row mb-3">
                                <div class="col-12 mt-4">
                                    <input type="text" disabled wire:model="name" class="form-control">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="amount" class="form-control" disabled>
                                </div>
                                <div class="col-12 mt-4">
                                    <select class="form-select" wire:model="salaryFor" aria-label="Default select example">
                                        <option value="fix">For Fixed</option>
                                        <option value="bonus">For Bonus</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="number" wire:model="given_amount" class="form-control"
                                        placeholder="Amount ">
                                </div>
                                <div class="col-12 mt-4">
                                    <input type="date" wire:model="given_date" class="form-control" id="dateInput" disabled>
                                </div>
                                <div class="col-1 mt-4">
                                    <button type="submit" class="btn btn-success">Store</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
