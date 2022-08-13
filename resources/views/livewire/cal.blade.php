<div class="container inline-block">

    <?php echo $cacc ?>
    <input type="text" name="" id="" class="m-1" wire:model="calc">
    <div class="row">

        <div class="col-4">
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center m-2" wire:click="fun(1)">1</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(2)">2</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(3)">3</div>
        </div>
        
    </div>
    <div class="row">

        <div class="col-4">
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(4)">4</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(5)">5</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(6)">6</div>
        </div>
        
    </div>
    <div class="row">

        <div class="col-4">
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(7)">7</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(8)">8</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="fun(9)">9</div>
        </div>
        
    </div>
    <div class="row">

        <div class="col-4">
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="cac(1)">+</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="cac(2)">-</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="cac(3)">*</div>
            <div style="width: 50px;height:50px;border:solid 1px black; float:left"
            class="d-flex align-items-center justify-content-center  m-2" wire:click="cac(4)">/</div>
        </div>
        
    </div>
    



</div>