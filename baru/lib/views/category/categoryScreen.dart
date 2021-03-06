import 'package:flutter/material.dart';
import 'package:baru/utils/constants.dart';
import 'package:baru/utils/size_config.dart';
import 'package:baru/models/product_card.dart';
import 'package:provider/provider.dart';
import 'package:baru/view_models/globalVariables_viewModel.dart';

class CategoryScreen extends StatelessWidget {
  static String routeName = "/category";

  @override
  Widget build(BuildContext context) {
    final CategoryDetailsArguments args =
        ModalRoute.of(context)!.settings.arguments as CategoryDetailsArguments;
    return Scaffold(
      backgroundColor: PrimaryLightColor,
      appBar: AppBar(
        elevation: 5,
        shadowColor: SecondaryColorDark.withOpacity(0.2),
        iconTheme: IconThemeData(color: SecondaryColorDark),
        title: Text(
          args.category,
          // 'oke',
          style: TextStyle(
            color: SecondaryColorDark,
            fontSize: getProportionateScreenWidth(20),
            fontWeight: FontWeight.w900,
            fontFamily: 'Panton',
          ),
        ),
        backgroundColor: CardBackgroundColor,
      ),
      body: Consumer<globalVars>(builder: (_, gv, __) {
        return GridView.count(
          padding: EdgeInsets.all(getProportionateScreenWidth(25)),
          childAspectRatio: Theme.of(context).platform == TargetPlatform.iOS
              ? MediaQuery.of(context).size.width /
                  (MediaQuery.of(context).size.height / 1.5)
              : MediaQuery.of(context).size.width /
                  (MediaQuery.of(context).size.height / 1.35),
          crossAxisSpacing: getProportionateScreenWidth(25),
          crossAxisCount: 2,
          children: 
          List.generate(
            gv.AllProds[args.category]!.length,
            (index) {
              return ProductCard(product: gv.AllProds[args.category]![index]);
            },
          ),
        );
      }),
    );
  }
}

class CategoryDetailsArguments {
  final String category;
  CategoryDetailsArguments({required this.category});
}
