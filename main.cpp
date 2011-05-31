#include <windows.h>

/*  Declare Windows procedure  */
LRESULT CALLBACK WindowProcedure (HWND, UINT, WPARAM, LPARAM);

/*  Make the class name into a global variable  */
char szClassName[ ] = "WindowsApp";

int WINAPI WinMain (HINSTANCE hThisInstance,
                    HINSTANCE hPrevInstance,
                    LPSTR lpszArgument,
                    int nFunsterStil)

{
    HWND hwnd;               /* This is the handle for our window */
    MSG messages;            /* Here messages to the application are saved */
    WNDCLASSEX wincl;        /* Data structure for the windowclass */

    /* The Window structure */
    wincl.hInstance = hThisInstance;
    wincl.lpszClassName = szClassName;
    wincl.lpfnWndProc = WindowProcedure;      /* This function is called by windows */
    wincl.style = CS_DBLCLKS;                 /* Catch double-clicks */
    wincl.cbSize = sizeof (WNDCLASSEX);

    /* Use default icon and mouse-pointer */
    wincl.hIcon = LoadIcon (NULL, IDI_APPLICATION);
    wincl.hIconSm = LoadIcon (NULL, IDI_APPLICATION);
    wincl.hCursor = LoadCursor (NULL, IDC_ARROW);
    wincl.lpszMenuName = NULL;                 /* No menu */
    wincl.cbClsExtra = 0;                      /* No extra bytes after the window class */
    wincl.cbWndExtra = 0;                      /* structure or the window instance */
    /* Use Windows's default color as the background of the window */
    wincl.hbrBackground = (HBRUSH) COLOR_BACKGROUND;

    /* Register the window class, and if it fails quit the program */
    if (!RegisterClassEx (&wincl))
        return 0;

    /* The class is registered, let's create the program*/
    hwnd = CreateWindowEx (
           0,                   /* Extended possibilites for variation */
           szClassName,         /* Classname */
           "Neverware",         /* Title Text */
           WS_OVERLAPPEDWINDOW,       /* default window */
           CW_USEDEFAULT,       /* Windows decides the position */
           CW_USEDEFAULT,       /* where the window ends up on the screen */
           300,                 /* The programs width */
           220,                 /* and height in pixels */
           HWND_DESKTOP,        /* The window is a child-window to desktop */
           NULL,                /* No menu */
           hThisInstance,       /* Program Instance handler */
           NULL                 /* No Window Creation data */
           );

    /* Make the window visible on the screen */
    ShowWindow (hwnd, nFunsterStil);

    /* Run the message loop. It will run until GetMessage() returns 0 */
    while (GetMessage (&messages, NULL, 0, 0))
    {
        /* Translate virtual-key messages into character messages */
        TranslateMessage(&messages);
        /* Send message to WindowProcedure */
        DispatchMessage(&messages);
    }

    /* The program return-value is 0 - The value that PostQuitMessage() gave */
    return messages.wParam;
}


/*  This function is called by the Windows function DispatchMessage()  */

LRESULT CALLBACK WindowProcedure (HWND hwnd, UINT message, WPARAM wParam, LPARAM lParam)
{
    static HWND edit1, edit2, edit3, edit4, but1;
    switch (message)                  /* handle the messages */
    {
        case WM_CREATE:
             CreateWindow("STATIC","Launch VMRC Program",
             WS_VISIBLE | WS_CHILD | SS_RIGHT,
             80,10,150,20,hwnd,NULL,NULL,NULL);
             CreateWindow("STATIC","IP Address",
             WS_VISIBLE | WS_CHILD | SS_RIGHT,
             10,50,75,20,hwnd,NULL,NULL,NULL);
             edit1 = CreateWindow( "Edit", "",
             WS_VISIBLE | WS_CHILD | WS_BORDER,
             90,50, 200, 20,
             hwnd, (HMENU) 1, NULL, NULL );
             CreateWindow("STATIC","User Name",
             WS_VISIBLE | WS_CHILD | SS_RIGHT,
             10,70,75,20,hwnd,NULL,NULL,NULL);
             edit2 = CreateWindow( "Edit", "",
             WS_VISIBLE | WS_CHILD | WS_BORDER,
             90,70, 200, 20,
             hwnd, (HMENU) 2, NULL, NULL );
             CreateWindow("STATIC","Password",
             WS_VISIBLE | WS_CHILD | SS_RIGHT,
             10,90,75,20,hwnd,NULL,NULL,NULL);
             edit3 = CreateWindow( "Edit", "",
             WS_VISIBLE | WS_CHILD | WS_BORDER,
             90,90, 200, 20,
             hwnd, (HMENU) 3, NULL, NULL );
             CreateWindow("STATIC","Version",
             WS_VISIBLE | WS_CHILD | SS_RIGHT,
             10,110,75,20,hwnd,NULL,NULL,NULL);
             edit4 = CreateWindow( "Edit", "",
             WS_VISIBLE | WS_CHILD | WS_BORDER,
             90,110, 200, 20,
             hwnd, (HMENU) 4, NULL, NULL );
            but1 = CreateWindow( "Button", "Connect",
             WS_VISIBLE | WS_CHILD | WS_BORDER,
             100,150, 100, 20,
             hwnd, (HMENU) 5, NULL, NULL );
             break;   
        case WM_COMMAND:
             if( LOWORD(wParam) == 5 )
             {
                 char ip[ 50 ];
                 char user[ 50 ];
                 char password[ 50 ];
                 char version[ 50 ];
                 GetWindowText( edit1, ip, 50 );
                 GetWindowText( edit2, user, 50 );
                 GetWindowText( edit3, password, 50 );
                 GetWindowText( edit4, version, 50 );
                 char buffer[ 250 ];
                 memset( buffer, 0x00, 250 );
                 strcpy( buffer, "vmware-vmrc" );
                 buffer[ strlen( buffer ) ] = 0x20;
                 strcpy( &buffer[ strlen( buffer ) ], " -h " );
                 strcpy( &buffer[ strlen( buffer ) ], ip );
                 buffer[ strlen( buffer ) ] = 0x20;
                 strcpy( &buffer[ strlen( buffer ) ], " -u \"" );
                 strcpy( &buffer[strlen( buffer ) ], user );
                 strcpy( &buffer[ strlen( buffer ) ], "\"" );
                 buffer[ strlen( buffer ) ] = 0x20;
                  strcpy( &buffer[ strlen( buffer ) ], " -p \"" );
                 strcpy( &buffer[strlen( buffer )  ], password );
                 strcpy( &buffer[ strlen( buffer ) ], "\"" );
                 buffer[ strlen( buffer ) ] = 0x20;
                 char master[ 100 ];
                 strcpy( master, "\"[Master] master" );
                 strcpy( &master[ strlen( master ) ], version );
                 strcpy( &master[ strlen( master ) ], "/master" );
                 strcpy( &master[ strlen( master ) ], version );
                 strcpy( &master[ strlen( master ) ], ".vmx\"" );
                 strcpy( &buffer[strlen( buffer )  ], master );
                 //MessageBox( 0, buffer, buffer, MB_OK );
                 system( buffer );
                 
                 exit( -1 );
             }
             break;
        case WM_DESTROY:
            PostQuitMessage (0);       /* send a WM_QUIT to the message queue */
            break;
        default:                      /* for messages that we don't deal with */
            return DefWindowProc (hwnd, message, wParam, lParam);
    }

    return 0;
}
