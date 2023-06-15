import java.util.ArrayList;

public class merge{
    public static void main(String[] args) {
        int a[]={1,2,3,4,5,6};
        int b[]={2,4,7,8,9};
        int c = a.length + b.length;
        ArrayList<Integer> d= new ArrayList<>();
        for(int i=0;i<a.length;i++){
            for(int j =0; j<b.length;j++){
                if(a[i]==b[j]) d.add(a[i]);
                
            }
        }
       
       System.out.println("Union array : "+d);
    }
}