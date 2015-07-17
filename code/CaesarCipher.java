import java.util.Scanner;
public class CaesarCipher
{
  public static void main(String[] args) 
  {
    //gets a string to encrypt
		int k =0 ,len=0 ;
		String str;
		Scanner sc = new Scanner(System.in);
		len = sc.nextInt();
		str = sc.next();
		k = sc.nextInt();
    if(str.length()>=1&&str.length()<=100)
    {
      if(k>=0&&k<=100)
      {
		System.out.println(applyCaesar(str,k));
      }
    }
  }
  public static String applyCaesar(String text, int shift)
  {
    char[] chars = text.toCharArray();
    for (int i=0; i < text.length(); i++)
    {
      char c = chars[i];
      // lower case
          if(Character.isUpperCase(c))
            chars[i] = rotateUpper(c,shift);
          if(Character.isLowerCase(c))
            chars[i] = rotate(c,shift);
    }
    return new String(chars);
  }
  public static char rotate(char c, int key) 
  {
    // c must be lowercase
       String s = "abcdefghijklmnopqrstuvwxyz";
       int i = 0;
       while (i < 26) 
       {
         // extra +26 below because key might be negative
          if (c == s.charAt(i)) 
          {
            return s.charAt((i + key + 26)%26);
          }
          i++;
       }
       return c;
   }
  public static char rotateUpper(char c, int key) { 
    String s = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    int i = 0;
    while (i < 26) 
    {
      // extra +26 below because key might be negative
         if (c == s.charAt(i)) 
         {
           return s.charAt((i + key + 26)%26);
         }
         i++;
    }
    return c;
  }
}

