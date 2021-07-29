class Product {
    constructor(name, ...grammages){
        this.name = name
        this.grammages = grammages
    }
}
const WEIGHT_UNIT = "gr"
const LIQUID_UNIT = "ml"

const HEMP_FLOWERS = [
    {
        name: "Brooklyn 66 CBD",
        grammarges:[
            { grammarge: 1.5, price: 4.00, unit: WEIGHT_UNIT },
            { grammarge: 3, price: 8.00, unit: WEIGHT_UNIT },
            { grammarge: 10, price: 22.00, unit: WEIGHT_UNIT} ,
            { grammarge: 25, price: 40.00, unit: WEIGHT_UNIT },
        ]
    },
    {
        name: "New Orleans Skunk",
        grammarges:[
            { grammarge: 1.5, price: 4.00, unit: WEIGHT_UNIT },
            { grammarge: 3, price: 8.00, unit: WEIGHT_UNIT },
            { grammarge: 10, price: 22.00, unit: WEIGHT_UNIT} ,
            { grammarge: 25, price: 40.00, unit: WEIGHT_UNIT },
        ]
    },
    {
        name: "Philadelphia Relax CBD",
        grammarges:[
            { grammarge: 1.5, price: 4.00, unit: WEIGHT_UNIT },
            { grammarge: 3, price: 8.00, unit: WEIGHT_UNIT },
            { grammarge: 10, price: 22.00, unit: WEIGHT_UNIT} ,
            { grammarge: 25, price: 40.00, unit: WEIGHT_UNIT },
        ]
    }
]
