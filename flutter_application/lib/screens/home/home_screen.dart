import 'package:flutter/material.dart';
import 'package:flutter_staggered_grid_view/flutter_staggered_grid_view.dart';
import 'package:grocery_app/models/grocery_item.dart';
import 'package:grocery_app/screens/product_details/product_details_screen.dart';
import 'package:grocery_app/screens/product_screen.dart';
import 'package:grocery_app/styles/colors.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:grocery_app/widgets/grocery_item_card_widget.dart';
import 'package:grocery_app/widgets/search_bar_widget.dart';
import 'dart:convert';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;
import 'grocery_featured_Item_widget.dart';
import 'home_banner_widget.dart';

class HomeScreen extends StatefulWidget {
  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  late List<GroceryItem> product = [];

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
            "sub_cat_id": "1",
          });
      if (response.statusCode == 200) {
        List<dynamic> jsonList = jsonDecode(response.body);
        print(jsonList);
        List<GroceryItem> fetchedProducts =
            jsonList.map((e) => GroceryItem.fromJson(e)).toList();
        setState(() {
          product = fetchedProducts;
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
      body: SafeArea(
        child: Container(
          child: SingleChildScrollView(
            child: Center(
              child: Column(
                children: [
                  SizedBox(
                    height: 15,
                  ),
                  SvgPicture.asset("assets/icons/app_icon_color.svg"),
                  SizedBox(
                    height: 5,
                  ),
                  padded(locationWidget()),
                  SizedBox(
                    height: 15,
                  ),
                  padded(SearchBarWidget()),
                  SizedBox(
                    height: 25,
                  ),
                  padded(HomeBanner()),
                  SizedBox(
                    height: 25,
                  ),
                  padded(subTitle("Exclusive Order")),
                  getHorizontalItemSlider(exclusiveOffers),
                  SizedBox(
                    height: 15,
                  ),
                  padded(subTitle("Best Selling")),
                  getHorizontalItemSlider(bestSelling),
                  SizedBox(
                    height: 15,
                  ),
                  padded(subTitle("Groceries")),
                  SizedBox(
                    height: 15,
                  ),
                  Container(
                    height: 105,
                    child: ListView(
                      padding: EdgeInsets.zero,
                      scrollDirection: Axis.horizontal,
                      children: [
                        SizedBox(
                          width: 20,
                        ),
                        GroceryFeaturedCard(
                          groceryFeaturedItems[0],
                          color: Color(0xffF8A44C),
                        ),
                        SizedBox(
                          width: 20,
                        ),
                        GroceryFeaturedCard(
                          groceryFeaturedItems[1],
                          color: AppColors.primaryColor,
                        ),
                        SizedBox(
                          width: 20,
                        ),
                      ],
                    ),
                  ),
                  SizedBox(
                    height: 15,
                  ),
                  getHorizontalItemSlider(groceries),
                  SizedBox(
                    height: 15,
                  ),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }

  Widget padded(Widget widget) {
    return Padding(
      padding: EdgeInsets.symmetric(horizontal: 25),
      child: widget,
    );
  }

  Widget getHorizontalItemSlider(List<GroceryItem> items) {
    return Container(
      margin: EdgeInsets.symmetric(vertical: 10),
      height: 250,
      child: ListView(
        children: [
          SingleChildScrollView(
            // scrollDirection: Axis.horizontal,
            child: StaggeredGrid.count(
              crossAxisCount: 2,
              // I only need two card horizontally
              children: product.asMap().entries.map<Widget>((e) {
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
          )
        ],
      ),
    );
  }

  // void onItemClicked(BuildContext context, GroceryItem groceryItem) {
  //   Navigator.push(
  //     context,
  //     MaterialPageRoute(
  //         builder: (context) => ProductDetailsScreen(
  //               groceryItem,
  //               heroSuffix: "home_screen",
  //             )),
  //   );
  // }

  Widget subTitle(String text) {
    return Row(
      children: [
        Text(
          text,
          style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
        ),
        Spacer(),
        Text(
          "See All",
          style: TextStyle(
              fontSize: 18,
              fontWeight: FontWeight.bold,
              color: AppColors.primaryColor),
        ),
      ],
    );
  }

  Widget locationWidget() {
    String locationIconPath = "assets/icons/location_icon.svg";
    return Row(
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        SvgPicture.asset(
          locationIconPath,
        ),
        SizedBox(
          width: 8,
        ),
        Text(
          "Shahibag,Ahmedabad",
          style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
        )
      ],
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
