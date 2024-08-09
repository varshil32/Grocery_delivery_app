import 'package:flutter/material.dart';
import 'package:grocery_app/common_widgets/app_button.dart';
import 'package:grocery_app/delivery_person/order_history1/order_item1.dart';
import 'package:grocery_app/delivery_person/order_history1/order_item_widget1.dart';
import 'package:grocery_app/helpers/column_with_seprator.dart';
import 'package:grocery_app/models/grocery_item.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

//import '../cart/checkout_bottom_sheet.dart';

class OrderScreen1 extends StatefulWidget {
  @override
  State<OrderScreen1> createState() => _OrderScreen1State();
}

class _OrderScreen1State extends State<OrderScreen1> {
  late List<OrderItem1> order = [];

  @override
  void initState() {
    super.initState();
    fetchOrder();
  }

  void fetchOrder() async {
    final response = await http.get(Uri.parse(
        'http://localhost/ty_project/admin_panel/delivery_person/apiorder1.php'));
    if (response.statusCode == 200) {
      List<dynamic> jsonList = jsonDecode(response.body);
      print(jsonList);
      List<OrderItem1> fetchedorders =
          jsonList.map((e) => OrderItem1.fromJson(e)).toList();
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
        automaticallyImplyLeading: false,
        backgroundColor: Colors.transparent,
        elevation: 0.0,
        title: Center(
          child: Text(
            "Order History",
            style: TextStyle(
                fontSize: 20, fontWeight: FontWeight.bold, color: Colors.green),
          ),
        ),
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
                    OrderItem1 orderItem = e.value;
                    return Container(
                      padding: EdgeInsets.symmetric(
                        horizontal: 25,
                      ),
                      width: double.maxFinite,
                      child: OrderItemWidget1(
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
