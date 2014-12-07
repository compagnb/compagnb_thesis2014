//
//  lvl1Scene.m
//  HeartCharacterV2
//
//  Created by compagnb on 3/8/14.
//  Copyright (c) 2014 compagnb. All rights reserved.
//

#import "lvl1Scene.h"

@implementation lvl1Scene

{
    //defining array
    SKSpriteNode *_anxietyLow;
    NSArray *_lvl1WaveFrames;
    
}

-(id)initWithSize:(CGSize)size {
    if (self = [super initWithSize:size]) {
        /* Setup your scene here */
        
        //background color blue
        self.backgroundColor = [SKColor blueColor];
        
        // set up paddling array to hold the frames
        NSMutableArray *waveFrames = [NSMutableArray array];
        
        //load and set up texture atlas
        SKTextureAtlas *lvl1AnimatedAtlas = [SKTextureAtlas atlasNamed:@"anxietyLow"];
        
        //gather the list of names from the atlas folder
        int numbImages = lvl1AnimatedAtlas.textureNames.count;
        for (int i=1; i<= numbImages; i++){
            NSString *textureName = [NSString stringWithFormat: @"anxietyLow%d", i];
            SKTexture *temp = [lvl1AnimatedAtlas textureNamed:textureName];
            [waveFrames addObject:temp];
        }
        _lvl1WaveFrames = waveFrames;
        
        //create the surfer and set it to the middle of the screen
        SKTexture *temp= _lvl1WaveFrames [0];
        _anxietyLow = [SKSpriteNode spriteNodeWithTexture:temp];
        _anxietyLow.position = CGPointMake(CGRectGetMidX(self.frame), CGRectGetMidY(self.frame));
        [self addChild: _anxietyLow];
        
        //start wadding
        [self lowAnxietyWaves];
        
    }
    
    return self;
}

//creating a new animation method
-(void)lowAnxietyWaves
{
    [_anxietyLow runAction:[SKAction repeatActionForever:[SKAction animateWithTextures:_lvl1WaveFrames timePerFrame:0.5f resize:NO restore:YES]] withKey:@"lowAnxietyWaves"];
    return;
}

-(void)update:(CFTimeInterval)currentTime {
    /* Called before each frame is rendered */
}


@end
