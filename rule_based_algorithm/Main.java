import java.util.*;
//1: 폐 O 0
//2: 심포 X
//3: 심장 O 1
//4: 간 O 2
//5: 췌장 O 3
//6: 위 O 4
//7: 삼초 X
//8: 소장 O 5
//9: 대장 O 6
//10: 담 O 7
//11:방광 O 8
//12: 신장 O 9

public class Main {
	static int max_data(float[] data) {
		float max = data[0];
		int max_index = 0;
		for(int i=1; i<data.length; i++) {
			if(max < data[i]) {
				max = data[i];
				max_index = i;
			}
		}	
		return max_index;
	}
	static float max(float[] data) {
		float max = data[0];
		for(int i=1; i<data.length; i++) {
			if(max < data[i]) {
				max = data[i];
			}
		}	
		return max;
	}
	static int min_data(float[] data) {
		float min = data[0];
		int min_index = 0;
		for(int i=1; i<data.length; i++) {
			if(min > data[i]) {
				min = data[i];
				min_index = i;
			}
		}
		return min_index;
	}
	static float min(float[] data) {
		float min = data[0];
		for(int i=1; i<data.length; i++) {
			if(min > data[i]) {
				min = data[i];
			}
		}
		return min;
	}
	static void calc(float[] current) {
		float[] organ_l = new float[10];
		float[] organ_r = new float[10];
		organ_l[0] = current[0];
		organ_l[1] = current[2];
		organ_l[2] = current[3];
		organ_l[3] = current[4];
		organ_l[4] = current[5];
		organ_l[5] = current[7];
		organ_l[6] = current[8];
		organ_l[7] = current[9];
		organ_l[8] = current[10];
		organ_l[9] = current[11];
		System.out.println("left ==> max:"+max(organ_l)+"min:"+min(organ_l));

		organ_r[0] = current[12];
		organ_r[1] = current[14];
		organ_r[2] = current[15];
		organ_r[3] = current[16];
		organ_r[4] = current[17];
		organ_r[5] = current[19];
		organ_r[6] = current[20];
		organ_r[7] = current[21];
		organ_r[8] = current[22];
		organ_r[9] = current[23];
		System.out.println("right ==> max:"+max(organ_r)+"min:"+min(organ_r));

		int strongest_current_l_index = 0;
		int weakest_current_l_index = 0;
		int strongest_current_r_index = 0;
		int weakest_current_r_index = 0;
						
		String type ="";
		
		int[] type_score_l = new int[8];
		int[] type_score_r = new int[8];

		
		type_score_l[0] = Renotonia(organ_l);
		type_score_l[1] = Vesicotonia(organ_l);
		type_score_l[2] = Hepatonia(organ_l);
		type_score_l[3]= Cholecystonia(organ_l);
		type_score_l[4] = Pulmotonia(organ_l);
		type_score_l[5] = Colonotonia(organ_l);
		type_score_l[6] = Pancreotonia(organ_l);
		type_score_l[7] = Gastrotonia(organ_l);
		
		type_score_r[0] = Renotonia(organ_r);
		type_score_r[1] = Vesicotonia(organ_r);
		type_score_r[2] = Hepatonia(organ_r);
		type_score_r[3]= Cholecystonia(organ_r);
		type_score_r[4] = Pulmotonia(organ_r);
		type_score_r[5] = Colonotonia(organ_r);
		type_score_r[6] = Pancreotonia(organ_r);
		type_score_r[7] = Gastrotonia(organ_r);
		
		int max_score_index_l = 0;
		int max_score_index_r = 0;
		
		int max_score_l = type_score_l[0];
		for(int i=1; i<type_score_l.length; i++) {
			if(max_score_l < type_score_l[i]) {
				max_score_l = type_score_l[i];
				max_score_index_l = i;
			}
		}	
		
		int max_score_r = type_score_r[0];
		for(int i=1; i<type_score_l.length; i++) {
			if(max_score_r < type_score_r[i]) {
				max_score_r = type_score_r[i];
				max_score_index_r = i;
			}
		}	
		
		if(max_score_l>max_score_r)
		{
			System.out.println("왼 score_l:"+max_score_l+" score_r:"+max_score_r);

			//왼손이 더 강할 때
			switch(max_score_index_l) {
				case 0: 
					type = "수양";
					break;
				case 1: 
					type = "수음";
					break;
				case 2: 
					type = "목양";
					break;
				case 3: 
					type = "목음";
					break;
				case 4: 
					type = "금양";
					break;
				case 5: 
					type = "금음";
					break;
				case 6: 
					type = "토양";
					break;
				case 7: 
					type = "토음";
					break;
			}
			System.out.println("체질: "+type);

		}
		else if(max_score_l<max_score_r) {
			System.out.println("오 score_l:"+max_score_l+" score_r:"+max_score_r);
			//오른손이 더 강할 때
			switch(max_score_index_r) {
			case 0: 
				type = "수양";
				break;
			case 1: 
				type = "수음";
				break;
			case 2: 
				type = "목양";
				break;
			case 3: 
				type = "목음";
				break;
			case 4: 
				type = "금양";
				break;
			case 5: 
				type = "금음";
				break;
			case 6: 
				type = "토양";
				break;
			case 7: 
				type = "토음";
				break;
		}
			System.out.println("체질: "+type);

		}
		else {
			//같을 때
			if(max_score_index_l==max_score_index_r) {
				System.out.println("같음 score:"+max_score_l);
				switch(max_score_index_l) {
					case 0: 
						type = "수양";
						break;
					case 1: 
						type = "수음";
						break;
					case 2: 
						type = "목양";
						break;
					case 3: 
						type = "목음";
						break;
					case 4: 
						type = "금양";
						break;
					case 5: 
						type = "금음";
						break;
					case 6: 
						type = "토양";
						break;
					case 7: 
						type = "토음";
						break;
				}
				System.out.println("체질: "+type);

			}
			else {
				System.out.println("같음 score:"+max_score_l);
				System.out.println("왼");
				switch(max_score_index_l) {
					case 0: 
						type = "수양";
						break;
					case 1: 
						type = "수음";
						break;
					case 2: 
						type = "목양";
						break;
					case 3: 
						type = "목음";
						break;
					case 4: 
						type = "금양";
						break;
					case 5: 
						type = "금음";
						break;
					case 6: 
						type = "토양";
						break;
					case 7: 
						type = "토음";
						break;
				}
				System.out.println("체질: "+type);

				System.out.println("오");
				switch(max_score_index_r) {
					case 0: 
						type = "수양";
						break;
					case 1: 
						type = "수음";
						break;
					case 2: 
						type = "목양";
						break;
					case 3: 
						type = "목음";
						break;
					case 4: 
						type = "금양";
						break;
					case 5: 
						type = "금음";
						break;
					case 6: 
						type = "토양";
						break;
					case 7: 
						type = "토음";
						break;
				}
				System.out.println("체질: "+type);

			}
			
		}
	}
	
	static int Renotonia(float[] organ) {
		int score = 0;
		
		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 9) {
			score += 40;
			if(min_index == 3) {
				score += 30;
				if(organ[0] > organ[2]) {
					score += 15;
				}
				if(organ[2] > organ[1]) {
					score += 15;
				}
			}
			else {
				if(organ[0] > organ[2]) {
					score += 15;
				}
				if(organ[2] > organ[1]) {
					score += 15;
				}
			}
		}
		//수양체질: 신장(방광) >폐(대장) >간(담) >심장(소장) >췌장(위장)
		return score;
	}
	static int Vesicotonia(float[] organ) {
		int score = 0;
		
		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 8) {
			score += 40;
			if(min_index == 4) {
				score += 30;
				if(organ[7] > organ[5]) {
					score += 15;
				}
				if(organ[6] > organ[4]) {
					score += 15;
				}
			}
			else {
				if(organ[5] > organ[6]) {
					score += 15;
				}
				if(organ[6] > organ[4]) {
					score += 15;
				}
		}
	}

		//수음체질: 방광(신장) >담(간) >소장(심장) >대장(폐) >위(췌장)
		return score;
	}
	static int Hepatonia(float[] organ) {
		int score = 0;
		
		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 2) {
			score += 40;
			if(min_index == 0) {
				score += 30;
				if(organ[9] > organ[1]) {
					score += 15;
				}
				if(organ[1] > organ[3]) {
					score += 15;
				}
			}
			else {
				if(organ[9] > organ[1]) {
					score += 15;
				}
				if(organ[1] > organ[3]) {
					score += 15;
				}
			}
		}
		//목양체질: 간(담) >신장(방광) >심장(소장) >췌장(위장) >폐(대장)
		return score;
	}
	static int Cholecystonia(float[] organ) {
		int score = 0;
		//목음체질: 담(간) >소장(심장) >위장(췌장) >방광(신장) >대장(폐)
	
		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 7) {
			score += 40;
			if(min_index == 6) {
				score += 30;
				if(organ[5] > organ[4]) {
					score += 15;
				}
				if(organ[4] > organ[8]) {
					score += 15;
				}
			}
			else {
				if(organ[5] > organ[4]) {
					score += 15;
				}
				if(organ[4] > organ[8]) {
					score += 15;
				}
			}
		}
		return score;
	}
	static int Pulmotonia(float[] organ) {
		int score = 0;
		//금양체질: 폐(대장) >췌장(위장) >심장(소장) >신장(방광) >간(담)

		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 0) {
			score += 40;
			if(min_index == 2) {
				score += 30;
				if(organ[3] > organ[1]) {
					score += 15;
				}
				if(organ[1] > organ[9]) {
					score += 15;
				}
			}
			else {
				if(organ[3] > organ[1]) {
					score += 15;
				}
				if(organ[1] > organ[9]) {
					score += 15;
				}
			}
		}
		return score;
	}
	static int Colonotonia(float[] organ) {
		int score = 0;
		//금음체질: 대장(폐) >방광(신장) >위장(췌장) >소장(심장) >담(간)

		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 6) {
			score += 40;
			if(min_index == 7) {
				score += 30;
				if(organ[8] > organ[4]) {
					score += 15;
				}
				if(organ[4] > organ[5]) {
					score += 15;
				}
			}
			else {
				if(organ[8] > organ[4]) {
					score += 15;
				}
				if(organ[4] > organ[5]) {
					score += 15;
				}
			}
		}
		return score;
	}
	static int Pancreotonia(float[] organ) {
		int score = 0;
		//토양체질: 췌장(위) >심장(소장) >간(담) >폐(대장) >신장(방광)

		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 3) {
			score += 40;
			if(min_index == 9) {
				score += 30;
				if(organ[1] > organ[2]) {
					score += 15;
				}
				if(organ[2] > organ[0]) {
					score += 15;
				}
			}
			else {
				if(organ[1] > organ[2]) {
					score += 15;
				}
				if(organ[2] > organ[0]) {
					score += 15;
				}
			}
		}
		return score;
	}
	static int Gastrotonia(float[] organ) {
		int score = 0;
		//토음체질: 위장(췌장) >대장(폐) >소장(심장) >담(간) >방광(신장)
		
		int max_index = max_data(organ);
		int min_index = min_data(organ);
		
		if(max_index == 4) {
			score += 40;
			if(min_index == 8) {
				score += 30;
				if(organ[6] > organ[5]) {
					score += 15;
				}
				if(organ[5] > organ[7]) {
					score += 15;
				}
			}
			else {
				if(organ[6] > organ[5]) {
					score += 15;
				}
				if(organ[5] > organ[7]) {
					score += 15;
				}
			}
		}
		return score;
	}
	
	
	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		while(true) {
			float[] data = new float[24];
			System.out.println("입력: ");

			for(int i = 0; i < 24; i++) {
				data[i] = sc.nextFloat();
			}
			calc(data);			
		}
	}
}
