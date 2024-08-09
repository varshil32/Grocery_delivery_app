import 'package:flutter/material.dart';
import 'package:grocery_app/common_widgets/app_text.dart';
import 'package:grocery_app/models/grocery_item.dart';
import 'package:grocery_app/styles/colors.dart';
import 'package:badges/badges.dart' as badges;

//import '../../widgets/item_counter_widget.dart';
import 'order_item.dart';

class OrderItemWidget extends StatefulWidget {
  OrderItemWidget({Key? key, required this.item}) : super(key: key);
  final OrderItem item;

  @override
  _OrderItemWidgetState createState() => _OrderItemWidgetState();
}

class _OrderItemWidgetState extends State<OrderItemWidget> {
  final double height = 110;
  var col;
  String stateString = "";

  final Color borderColor = Color(0xffE2E2E2);

  final double borderRadius = 18;

  int amount = 1;
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    if (int.parse(widget.item.status) == 0) {
      col = Colors.orangeAccent;
      stateString = "Pending";
    } else {
      col = Colors.greenAccent;
      stateString = "Success";
    }
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      height: height,
      margin: EdgeInsets.symmetric(
        vertical: 10,
      ),
      child: IntrinsicHeight(
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            // imageWidget(),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Container(
                  height: 50,
                  width: 230,
                  child: Container(
                    width: 50,
                    height: 0,
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Expanded(
                          child: SingleChildScrollView(
                            child: AppText(
                              text: widget.item.product_name,
                              fontSize: 16,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
                SizedBox(
                  height: 5,
                ),
                AppText(
                    text: ("Order id: " + widget.item.id),
                    fontSize: 14,
                    fontWeight: FontWeight.bold,
                    color: AppColors.darkGrey),
                SizedBox(
                  height: 5,
                ),
                AppText(
                    text: widget.item.doi,
                    fontSize: 14,
                    fontWeight: FontWeight.bold,
                    color: AppColors.darkGrey),
                SizedBox(
                  height: 5,
                ),
                Spacer(),
              ],
            ),
            Column(
              children: [
                // Icon(
                //   Icons.close,
                //   color: AppColors.darkGrey,
                //   size: 25,
                // ),
                // AppText(
                //   text: widget.item.status,
                //   fontSize: 16,
                //   fontWeight: FontWeight.bold,
                // ),

                badges.Badge(
                  badgeStyle: badges.BadgeStyle(
                      shape: badges.BadgeShape.square, badgeColor: col),
                  badgeContent: Text(stateString),
                ),

                Spacer(
                  flex: 5,
                ),
                Container(
                  width: 70,
                  child: AppText(
                    text: "\$${widget.item.amount}",
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                    textAlign: TextAlign.right,
                  ),
                ),
                Spacer(),
              ],
            )
          ],
        ),
      ),
    );
  }

  // Widget imageWidget() {
  //   return Container(
  //     width: 100,
  //     child: Image.asset(widget.item.imagePath),
  //   );
  // }
}
