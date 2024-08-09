import 'package:flutter/material.dart';
import 'package:flutter_staggered_grid_view/flutter_staggered_grid_view.dart';
import 'package:grocery_app/common_widgets/app_text.dart';
import 'package:grocery_app/models/grocery_item.dart';
import 'package:grocery_app/models/subcategory_item.dart';
import 'package:grocery_app/screens/product_details/product_details_screen.dart';
import 'package:grocery_app/widgets/grocery_item_card_widget.dart';
import 'dart:convert';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;

import 'filter_screen.dart';

class SubCategoryItemsScreen extends StatefulWidget {
    final int id;

  SubCategoryItemsScreen({required this.id, required Map<String, int> map});
  @override
  State<SubCategoryItemsScreen> createState() => _SubCategoryItemsScreenState();
}

class _SubCategoryItemsScreenState extends State<SubCategoryItemsScreen> {
  late List<GroceryItem> groceryItem = [];

  @override
  void initState() {
    super.initState();
    fetchproduct();
  }

  Future<void> fetchproduct() async {
    try {
      final response = await http.post(
          Uri.parse(
              'http://localhost/ty_project/admin_panel/apiviewproduct.php'),
          body: {
           "sub_cat_id": widget.id.toString(),
          });
      if (response.statusCode == 200) {
        List<dynamic> jsonList = jsonDecode(response.body);
        print(jsonList);
        List<GroceryItem> fetchedProducts =
            jsonList.map((e) => GroceryItem.fromJson(e)).toList();
        setState(() {
          groceryItem = fetchedProducts;
        });
      } else {
        throw Exception('Failed to load categories');
      }
    } catch (Exception) {
      print(Exception);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.transparent,
        elevation: 0,
        centerTitle: true,
        automaticallyImplyLeading: false,
        leading: GestureDetector(
          onTap: () {
            Navigator.pop(context);
          },
          child: Container(
            padding: EdgeInsets.only(left: 25),
            child: Icon(
              Icons.arrow_back_ios,
              color: Colors.black,
            ),
          ),
        ),
        actions: [
          GestureDetector(
            onTap: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => FilterScreen()),
              );
            },
            child: Container(
              padding: EdgeInsets.only(right: 25),
              child: Icon(
                Icons.sort,
                color: Colors.black,
              ),
            ),
          ),
        ],
        title: Container(
          padding: EdgeInsets.symmetric(
            horizontal: 25,
          ),
          child: AppText(
            text: "Products",
            fontWeight: FontWeight.bold,
            fontSize: 20,
          ),
        ),
      ),
      body: SingleChildScrollView(
        child: StaggeredGrid.count(
          crossAxisCount: 2,
          // I only need two card horizontally
          children: groceryItem.asMap().entries.map<Widget>((e) {
          int index = e.key;
         GroceryItem groceryItem = e.value;
          return GestureDetector(
            onTap: () {
             onItemClicked(context, groceryItem);
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => SubCategoryItemsScreen(
                    map: {'map': 1},
                    id: int.parse(groceryItem.id),
                  ),
                ),
              );
            },
              child: Container(
                padding: EdgeInsets.all(10),
                child: GroceryItemCardWidget(
                  item: groceryItem,
                  heroSuffix: "explore_screen",
                ),
              ),
            );
          }).toList(),
          mainAxisSpacing: 3.0,
          crossAxisSpacing: 0.0, // add some space
        ),
      ),
    );
  }

  void onItemClicked(BuildContext context, GroceryItem groceryItem) {
    Navigator.push(
      context,
      MaterialPageRoute(
        builder: (context) => ProductDetailsScreen(
          groceryItem,
          heroSuffix: "explore_screen",
        ),
      ),
    );
  }
}
