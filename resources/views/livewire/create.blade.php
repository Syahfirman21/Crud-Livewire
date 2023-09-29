<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nama:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Email:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="email" placeholder="Masukan Email"></textarea>
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Nomer Telpon:</label>
        <textarea type="email" class="form-control" id="exampleFormControlInput2" wire:model="phon_number" placeholder="Masukan No Telpon"></textarea>
        @error('phon_number') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>