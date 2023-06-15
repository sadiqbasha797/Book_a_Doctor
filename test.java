import java.util.Scanner;

class Main{
    public static void main(String[] args) {
        Scanner x = new Scanner(System.in);
        int units = 498;
        float price=0;
        if(units>0 && units<100){
             price = units *0.50f;
        }
        else if(units>100 && units<200){
            price = 50+(units-100) * 0.75f;
        }
        else{
            price = 50+75+(units-200)*1.25f;
        }
        System.out.printf("%f",price);
    }
}