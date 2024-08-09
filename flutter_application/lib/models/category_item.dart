import 'dart:convert';

class CategoryItem {
  final String id;
  final String name;
  final String imagePath;

  CategoryItem({required this.id, required this.name, required this.imagePath});

  factory CategoryItem.fromJson(Map<String, dynamic> json) {
    return CategoryItem(
      id: json['id'],
      name: json['name'],
      imagePath: json['imagePath'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'name': name,
      'image': imagePath,
    };
  }
}

// var categoryItemsDemo = [
//   CategoryItem(
//     name: "Fresh Fruits & Vegetables",
//     imagePath: "assets/images/categories_images/fruit.png",
//   ),
//   CategoryItem(
//     name: "Cooking Oil",
//     imagePath: "assets/images/categories_images/oil.png",
//   ),
//   CategoryItem(
//     name: "Meat & Fish",
//     imagePath: "assets/images/categories_images/meat.png",
//   ),
//   CategoryItem(
//     name: "Bakery & Snacks",
//     imagePath: "assets/images/categories_images/bakery.png",
//   ),
//   CategoryItem(
//     name: "Dairy & Eggs",
//     imagePath: "assets/images/categories_images/dairy.png",
//   ),
//   CategoryItem(
//     name: "Beverages",
//     imagePath: "assets/images/categories_images/beverages.png",
//   ),
// ];

