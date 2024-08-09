import 'package:flutter/material.dart';
import 'package:grocery_app/common_widgets/app_button.dart';
import 'package:grocery_app/helpers/column_with_seprator.dart';
import 'package:grocery_app/models/grocery_item.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

//import '../cart/checkout_bottom_sheet.dart';
import 'order_item_widget.dart';
import 'order_item.dart';

class OrderScreen extends StatefulWidget {
  @override
  State<OrderScreen> createState() => _OrderScreenState();
}

class _OrderScreenState extends State<OrderScreen> {
  late List<OrderItem> order = [];

  @override
  void initState() {
    super.initState();
    fetchOrder();
  }

  void fetchOrder() async {
    final response = await http
        .get(Uri.parse('http://localhost/ty_project/admin_panel/apiorder.php'));
    if (response.statusCode == 200) {
      List<dynamic> jsonList = jsonDecode(response.body);
      print(jsonList);
      List<OrderItem> fetchedorders =
          jsonList.map((e) => OrderItem.fromJson(e)).toList();
      setState(() {
        order = fetchedorders;
      });
    } else {
      throw Exception('Failed to load categories');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Color(0xff53B175),
        elevation: 0.0,
        title: Text(
          "Order History",
          style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
        ),
        leading: IconButton(
            onPressed: () {
              Navigator.pop(context);
            },
            icon: Icon(Icons.arrow_back)),
      ),
      body: SafeArea(
        child: SingleChildScrollView(
          child: Column(
            children: [
              SizedBox(
                height: 15,
              ),
              // Text(
              //   "Order History",
              //   style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
              // ),
              // SizedBox(
              //   height: 5,
              // ),
              Column(
                children: getChildrenWithSeperator(
                  addToLastChild: false,
                  widgets: order.asMap().entries.map<Widget>((e) {
                    OrderItem orderItem = e.value;
                    return Container(
                      padding: EdgeInsets.symmetric(
                        horizontal: 25,
                      ),
                      width: double.maxFinite,
                      child: OrderItemWidget(
                        item: orderItem,
                      ),
                    );
                  }).toList(),
                  seperator: Padding(
                    padding: const EdgeInsets.symmetric(
                      horizontal: 25,
                    ),
                    child: Divider(
                      thickness: 1,
                    ),
                  ),
                ),
              ),
              Divider(
                thickness: 1,
              ),
              //getCheckoutButton(context)
            ],
          ),
        ),
      ),
    );
  }
}
