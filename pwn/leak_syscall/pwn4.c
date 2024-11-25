#include <stdio.h>

// 函数声明
void printPoem();
void tellStory();
void getUserInput();
void makeDecision();
void createPoem();

void MSDbqmFKs() {
    unsigned long long b = 0x05c3585f5e5a;
}

void init() {
    setbuf(stdin, 0);  
    setbuf(stderr, 0);  
    setbuf(stdout, 0); 
}

int main() {
    init();
    // 调用打印诗句的函数
    printPoem();
    // 调用讲述小故事的函数
    tellStory();
    // 调用获取用户输入的函数
    getUserInput();
    // 调用让用户做决定的函数
    makeDecision();
    return 0;
}

// 定义打印诗句的函数
void printPoem() {
    printf("被酒莫惊春睡重，时有微雨夜连月。\n");
}

// 定义讲述小故事的函数
void tellStory() {
    printf("从前有一个诗人，名叫李明。\n");
    printf("他喜欢在月光下饮酒，享受宁静的时光。\n");
    printf("有一天，他在月光下的一杯酒中，看到了自己的影子。\n");
    printf("影子告诉他，春天即将来临，但时间不多了。\n");
    printf("李明深受感动，决定写下这句诗：“被酒莫惊春睡重，时有微雨夜连月。”\n");
    printf("这句诗不仅表达了他对春天的喜爱，也表达了他对生活的珍惜。\n");
}

// 定义获取用户输入的函数
void getUserInput() {
    char userName[50];
    printf("请输入你的名字: ");
    scanf("%s", userName);
    printf("你好, %p! 希望你也能像李明一样，珍惜每一个美好的瞬间。\n", userName);
}

// 定义让用户做决定的函数
void makeDecision() {
    int choice;
    printf("现在，想象你是李明，面对即将到来的春天，你会选择做什么？\n");
    printf("1. 继续饮酒作诗，享受宁静的时光。\n");
    printf("2. 放下酒杯，去欣赏春天的美景。\n");
    printf("3. 邀请朋友一起分享这份美好。\n");
    printf("请输入你的选择 (1-3): ");
    scanf("%d", &choice);
    getchar();

    switch(choice) {
        case 1:
            printf("你选择了继续饮酒作诗。在这宁静的时光里，你创作出了更多美妙的诗篇。\n");
            createPoem();
            break;
        case 2:
            printf("你选择了放下酒杯，去欣赏春天的美景。大自然的美丽让你心旷神怡，灵感如泉涌般涌现。\n");
            break;
        case 3:
            printf("你选择了邀请朋友一起分享这份美好。大家欢聚一堂，共度了一个难忘的夜晚。\n");
            break;
        default:
            printf("无效的选择，请重新运行程序并输入正确的选项。\n");
            break;
    }
}

// 定义创建诗句的函数
void createPoem() {
    char poem[32];
    printf("请输入你的新诗（不超过255个字符）: \n");
    read(0,poem,0x100);
    printf("你的新诗是:\n%s\n", poem);
}
// gcc -no-pie -z now -fno-stack-protector -o pwn pwn4.c
// patch syscall;ret;