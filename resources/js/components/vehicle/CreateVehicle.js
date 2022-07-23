export default (initialVehicles = []) => ({
    vehicles: initialVehicles,

    init() {
        if(this.vehicles.length === 0) {
            this.add();
        }
    },

    add() {
        console.log("ADD VEHICLE");

        this.vehicles.push({
            vin: '',
            make: '',
            model: '',
            year: '',
            color: '',
            operable: '',
            type: '',
            lot_number: '',
            buyer: ''
        });
    },

    remove(index) {
        const deleted = this.vehicles.splice(index, 1);
        console.log("REMOVE VEHICLE", deleted);
    }
})
