class GroceryItem {
  final String id;
  final String name;
  final String description;
  final String price;
  final String imagePath;

  GroceryItem({
    required this.id,
    required this.name,
    required this.description,
    required this.price,
    required this.imagePath,
  });
  factory GroceryItem.fromJson(Map<String, dynamic> json) {
    return GroceryItem(
      id: json['id'],
      name: json['name'],
      description: json['description'],
      price: json['price'],
      imagePath: json['imagePath'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'name': name,
      'description': description,
      'price': price,
      'image': imagePath,
    };
  }
}



 var demoItems = [
  GroceryItem(
      id: "1",
      name: "Organic Bananas",
      description: "7pcs, Priceg",
      price: "4.99",
      imagePath: "assets/images/grocery_images/banana.png"),
  GroceryItem(
      id: "2",
      name: "Red Apple",
      description: "1kg, Priceg",
      price: "4.99",
      imagePath: "assets/images/grocery_images/apple.png"),
  GroceryItem(
      id: "3",
      name: "Bell Pepper Red",
      description: "1kg, Priceg",
      price: "4.99",
      imagePath: "assets/images/grocery_images/pepper.png"),
  GroceryItem(
      id:"4",
      name: "Ginger",
      description: "250gm, Priceg",
      price: "4.99",
      imagePath: "assets/images/grocery_images/ginger.png"),
  GroceryItem(
      id: "5",
      name: "Meat",
      description: "250gm, Priceg",
      price: "4.99",
      imagePath: "assets/images/grocery_images/beef.png"),
  GroceryItem(
      id: "6",
      name: "Chikken",
      description: "250gm, Priceg",
      price: "4.99",
      imagePath: "assets/images/grocery_images/chicken.png"),
];



var exclusiveOffers = [demoItems[0], demoItems[1]];

var bestSelling = [demoItems[2], demoItems[3]];

var groceries = [demoItems[4], demoItems[5]];


