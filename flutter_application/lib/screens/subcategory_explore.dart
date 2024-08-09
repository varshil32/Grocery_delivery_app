import 'package:flutter/material.dart';
import 'package:flutter_staggered_grid_view/flutter_staggered_grid_view.dart';
import 'package:grocery_app/common_widgets/app_text.dart';
import 'package:grocery_app/models/subcategory_item.dart';
import 'package:grocery_app/screens/product_screen.dart';

import '../models/subcategory_item.dart';
import 'package:grocery_app/widgets/category_item_card_widget.dart';
import 'package:grocery_app/widgets/search_bar_widget.dart';
import 'dart:convert';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:http/http.dart' as http;

import '../widgets/subcategory_item_card_widget.dart';
import 'category_items_screen.dart';

List<Color> gridColors = [
  Color(0xff53B175),
  Color(0xffF8A44C),
  Color(0xffF7A593),
  Color(0xffD3B0E0),
  Color(0xffFDE598),
  Color(0xffB7DFF5),
  Color(0xff836AF6),
  Color(0xffD73B77),
];

class SubExploreScreen extends StatefulWidget {
  final int id;

  SubExploreScreen({required this.id, required Map<String, int> map});
  //SubExploreScreen(Map<String, int> map);

  @override
  State<SubExploreScreen> createState() => _ExploreScreenState();
}

class _ExploreScreenState extends State<SubExploreScreen> {
  late List<SubCategoryItem> subcategories = [];

  @override
  void initState() {
    super.initState();
    fetchSubCategories();
  }

  Future<void> fetchSubCategories() async {
    try {
      final response = await http.post(
          Uri.parse(
              'http://localhost/ty_project/admin_panel/apiviewsubcategory.php'),
          body: {
            "cat_id": widget.id.toString(),
          });
      if (response.statusCode == 200) {
        List<dynamic> jsonList = jsonDecode(response.body);
        print(jsonList);
        List<SubCategoryItem> fetchedSubCategories =
            jsonList.map((e) => SubCategoryItem.fromJson(e)).toList();
        setState(() {
          subcategories = fetchedSubCategories;
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
      child: Column(
        children: [
          getHeader(),
          Expanded(
            child: getStaggeredGridView(context),
          ),
        ],
      ),
    ));
  }

  Widget getHeader() {
    return Column(
      children: [
        SizedBox(
          height: 20,
        ),
        Center(
          child: AppText(
            text: "Find Products",
            fontSize: 20,
            fontWeight: FontWeight.bold,
          ),
        ),
        SizedBox(
          height: 20,
        ),
        Padding(
          padding: EdgeInsets.symmetric(horizontal: 10),
          child: SearchBarWidget(),
        ),
      ],
    );
  }

  Widget getStaggeredGridView(BuildContext context) {
    return SingleChildScrollView(
      padding: EdgeInsets.symmetric(
        vertical: 10,
      ),
      child: StaggeredGrid.count(
        crossAxisCount: 2,
        children: subcategories.asMap().entries.map<Widget>((e) {
          int index = e.key;
          SubCategoryItem SubcategoryItem = e.value;
          return GestureDetector(
            onTap: () {
              //onSubCategoryItemClicked(context, SubcategoryItem);
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => SubCategoryItemsScreen(
                    map: {'map': 1},
                    id: int.parse(SubcategoryItem.id),
                  ),
                ),
              );
            },
            child: Container(
              padding: EdgeInsets.all(10),
              child: SubCategoryItemCardWidget(
                item: SubcategoryItem,
                color: gridColors[index % gridColors.length],
              ),
            ),
          );
        }).toList(),
        mainAxisSpacing: 3.0,
        crossAxisSpacing: 4.0, // add some space
      ),
    );
  }

  // void onSubCategoryItemClicked(
  //     BuildContext context, SubCategoryItem SubcategoryItem) {
  //   Navigator.of(context).push(new MaterialPageRoute(
  //     builder: (BuildContext context) {
  //       return produ
  //     },
  //   )
  //   );
  // }
}
